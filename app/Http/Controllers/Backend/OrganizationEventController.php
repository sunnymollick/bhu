<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrganizationEvent;
use App\Models\OrganizationEventGallery;
use App\Models\Organization;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class OrganizationEventController extends Controller
{
    public function all(Request $request){
        $user = Auth::user();

        // Check if user is Admin or Super Admin (role_id 1 or 2)
        if ($user->role_id == 1 || $user->role_id == 2) {
            // Admin and Super Admin can see all events
            $query = OrganizationEvent::with(['organization', 'creator'])->orderBy('id', 'desc');

            // Apply filters based on query parameters
            if ($request->has('filter')) {
                $filter = $request->get('filter');

                if ($filter === 'pending_approval') {
                    $query->where(function($q) {
                        $q->where('status', 0)->orWhereNull('status');
                    });
                }
            }

            $events = $query->get();
        } else {
            // Normal users can only see events for organizations they created
            $userOrganizationIds = Organization::where('created_by', $user->id)->pluck('id');
            $events = OrganizationEvent::with(['organization', 'creator'])
                ->whereIn('organization_id', $userOrganizationIds)
                ->orderBy('id', 'desc')
                ->get();
        }

        return view('backend.pages.organization_event.all', compact('events'));
    }

    public function create(){
        $user = Auth::user();

        // Check if user is Admin or Super Admin (role_id 1 or 2)
        if ($user->role_id == 1 || $user->role_id == 2) {
            // Admin and Super Admin can create events for any organization
            $organizations = Organization::where('status', 'approved')->get();
        } else {
            // Normal users can only create events for their own organizations
            $organizations = Organization::where('status', 'approved')
                ->where('created_by', $user->id)
                ->get();
        }

        return view('backend.pages.organization_event.create', compact('organizations'));
    }

    public function store(Request $request){
        $request->validate([
            'organization_id' => 'required|exists:organizations,id',
            'event_name' => 'required|string|max:255',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'location' => 'nullable|string|max:255',
            'event_date' => 'required|date',
            'event_date_end' => 'nullable|date|after_or_equal:event_date',
            'event_time_start' => 'nullable|date_format:H:i',
            'event_time_end' => 'nullable|date_format:H:i',
            'schedule' => 'nullable|string',
            'short_description' => 'nullable|string|max:500',
            'description' => 'nullable|string',
            'gallery_images' => 'nullable|array',
            'gallery_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $user = Auth::user();

        // Check if user has permission to create event for this organization
        if ($user->role_id != 1 && $user->role_id != 2) {
            // Normal users can only create events for their own organizations
            $organization = Organization::find($request->organization_id);
            if (!$organization || $organization->created_by != $user->id) {
                return redirect()->back()->withInput()->with('error', 'You do not have permission to create events for this organization.');
            }
        }

        try {
            DB::beginTransaction();

            $event = new OrganizationEvent();
            $event->organization_id = $request->organization_id;
            $event->event_name = $request->event_name;

            // Handle banner image upload
            if ($request->hasFile('banner_image')) {
                $bannerImage = $request->file('banner_image');
                $bannerName = Str::uuid() . '.' . $bannerImage->getClientOriginalExtension();
                $bannerImage->move(public_path('backend/uploads/organization_event/banner'), $bannerName);
                $event->banner_image = $bannerName;
            }

            $event->location = $request->location;
            $event->event_date = $request->event_date;
            $event->event_date_end = $request->event_date_end;
            $event->event_time_start = $request->event_time_start;
            $event->event_time_end = $request->event_time_end;
            $event->schedule = $request->schedule;
            $event->short_description = $request->short_description;
            $event->description = $request->description;
            $event->status = $request->has('status');
            $event->created_by = Auth::id();
            $event->save();

            // Handle gallery images
            if ($request->hasFile('gallery_images')) {
                foreach ($request->file('gallery_images') as $image) {
                    $imageName = Str::uuid() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('backend/uploads/organization_event/gallery'), $imageName);

                    $gallery = new OrganizationEventGallery();
                    $gallery->picture = $imageName;
                    $gallery->organization_id = $request->organization_id;
                    $gallery->organization_event_id = $event->id;
                    $gallery->status = true;
                    $gallery->created_by = Auth::id();
                    $gallery->save();
                }
            }

            DB::commit();
            return redirect()->route('admin.organization_event.all')->with('success', 'Event created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();

            // Delete uploaded banner image if exists
            if (isset($bannerName) && File::exists(public_path('backend/uploads/organization_event/banner/' . $bannerName))) {
                File::delete(public_path('backend/uploads/organization_event/banner/' . $bannerName));
            }

            // Delete uploaded gallery images if any
            if (isset($event) && $request->hasFile('gallery_images')) {
                foreach ($request->file('gallery_images') as $image) {
                    $imageName = Str::uuid() . '.' . $image->getClientOriginalExtension();
                    if (File::exists(public_path('backend/uploads/organization_event/gallery/' . $imageName))) {
                        File::delete(public_path('backend/uploads/organization_event/gallery/' . $imageName));
                    }
                }
            }

            return redirect()->back()->withInput()->with('error', 'Failed to create event: ' . $e->getMessage());
        }
    }

    public function edit($id){
        $user = Auth::user();
        $event = OrganizationEvent::findOrFail($id);

        // Check if user has permission to edit this event
        if ($user->role_id != 1 && $user->role_id != 2) {
            // Normal users can only edit events for their own organizations
            $organization = Organization::find($event->organization_id);
            if (!$organization || $organization->created_by != $user->id) {
                return redirect()->route('admin.organization_event.all')->with('error', 'You do not have permission to edit this event.');
            }
        }

        // Check if user is Admin or Super Admin (role_id 1 or 2)
        if ($user->role_id == 1 || $user->role_id == 2) {
            // Admin and Super Admin can see all organizations
            $organizations = Organization::where('status', 'approved')->get();
        } else {
            // Normal users can only see their own organizations
            $organizations = Organization::where('status', 'approved')
                ->where('created_by', $user->id)
                ->get();
        }

        return view('backend.pages.organization_event.edit', compact('event', 'organizations'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'organization_id' => 'required|exists:organizations,id',
            'event_name' => 'required|string|max:255',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'location' => 'nullable|string|max:255',
            'event_date' => 'required|date',
            'event_date_end' => 'nullable|date|after_or_equal:event_date',
            'event_time_start' => 'nullable|date_format:H:i',
            'event_time_end' => 'nullable|date_format:H:i',
            'schedule' => 'nullable|string',
            'short_description' => 'nullable|string|max:500',
            'description' => 'nullable|string',
            'gallery_images' => 'nullable|array',
            'gallery_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $user = Auth::user();

        // Check if user has permission to update event for this organization
        if ($user->role_id != 1 && $user->role_id != 2) {
            // Normal users can only update events for their own organizations
            $organization = Organization::find($request->organization_id);
            if (!$organization || $organization->created_by != $user->id) {
                return redirect()->back()->withInput()->with('error', 'You do not have permission to update events for this organization.');
            }
        }

        try {
            DB::beginTransaction();

            $event = OrganizationEvent::findOrFail($id);
            $oldBannerImage = $event->banner_image;

            $event->organization_id = $request->organization_id;
            $event->event_name = $request->event_name;

            // Handle banner image upload
            if ($request->hasFile('banner_image')) {
                $bannerImage = $request->file('banner_image');
                $bannerName = Str::uuid() . '.' . $bannerImage->getClientOriginalExtension();
                $bannerImage->move(public_path('backend/uploads/organization_event/banner'), $bannerName);
                $event->banner_image = $bannerName;
            }

            $event->location = $request->location;
            $event->event_date = $request->event_date;
            $event->event_date_end = $request->event_date_end;
            $event->event_time_start = $request->event_time_start;
            $event->event_time_end = $request->event_time_end;
            $event->schedule = $request->schedule;
            $event->short_description = $request->short_description;
            $event->description = $request->description;
            $event->status = $request->has('status');
            $event->updated_by = Auth::id();
            $event->save();

            // Handle new gallery images
            if ($request->hasFile('gallery_images')) {
                foreach ($request->file('gallery_images') as $image) {
                    $imageName = Str::uuid() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('backend/uploads/organization_event/gallery'), $imageName);

                    $gallery = new OrganizationEventGallery();
                    $gallery->picture = $imageName;
                    $gallery->organization_id = $request->organization_id;
                    $gallery->organization_event_id = $event->id;
                    $gallery->status = true;
                    $gallery->created_by = Auth::id();
                    $gallery->updated_by = Auth::id();
                    $gallery->save();
                }
            }

            DB::commit();

            // Delete old banner image after successful commit
            if ($request->hasFile('banner_image') && $oldBannerImage) {
                $oldBannerPath = public_path('backend/uploads/organization_event/banner/' . $oldBannerImage);
                if (File::exists($oldBannerPath)) {
                    File::delete($oldBannerPath);
                }
            }

            return redirect()->route('admin.organization_event.all')->with('success', 'Event updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();

            // Delete newly uploaded banner if exists
            if (isset($bannerName) && File::exists(public_path('backend/uploads/organization_event/banner/' . $bannerName))) {
                File::delete(public_path('backend/uploads/organization_event/banner/' . $bannerName));
            }

            return redirect()->back()->withInput()->with('error', 'Failed to update event: ' . $e->getMessage());
        }
    }

    public function deleteGalleryImage($id){
        try {
            $gallery = OrganizationEventGallery::findOrFail($id);

            // Delete image file
            $imagePath = public_path('backend/uploads/organization_event/gallery/' . $gallery->picture);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }

            $gallery->delete();

            return response()->json(['success' => true, 'message' => 'Image deleted successfully.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to delete image: ' . $e->getMessage()], 500);
        }
    }

    public function destroy($id){
        try {
            DB::beginTransaction();

            $event = OrganizationEvent::findOrFail($id);

            // Delete banner image
            if ($event->banner_image) {
                $bannerPath = public_path('backend/uploads/organization_event/banner/' . $event->banner_image);
                if (File::exists($bannerPath)) {
                    File::delete($bannerPath);
                }
            }

            // Delete all gallery images
            foreach ($event->galleries as $gallery) {
                $imagePath = public_path('backend/uploads/organization_event/gallery/' . $gallery->picture);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
                $gallery->delete();
            }

            $event->delete();

            DB::commit();
            return redirect()->route('admin.organization_event.all')->with('success', 'Event deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.organization_event.all')->with('error', 'Failed to delete event: ' . $e->getMessage());
        }
    }

    public function toggleStatus($id)
    {
        try {
            $event = OrganizationEvent::findOrFail($id);
            $user = Auth::user();

            // Check if user has permission to toggle status
            // Only admin, super admin, or the owner can toggle status
            if ($user->role_id != 1 && $user->role_id != 2) {
                // Check if user is the owner of the organization
                $isOwner = Organization::where('id', $event->organization_id)
                    ->where('created_by', $user->id)
                    ->exists();

                if (!$isOwner) {
                    return redirect()->route('admin.organization_event.all')->with('error', 'You do not have permission to toggle this event status.');
                }
            }

            // Toggle the status
            $event->status = !$event->status;
            $event->updated_by = Auth::id();
            $event->save();

            $statusText = $event->status ? 'activated' : 'deactivated';
            return redirect()->route('admin.organization_event.all')->with('success', 'Event ' . $statusText . ' successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.organization_event.all')->with('error', 'Failed to toggle event status: ' . $e->getMessage());
        }
    }
}
