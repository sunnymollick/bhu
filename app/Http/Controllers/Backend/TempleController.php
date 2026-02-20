<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Imports\TemplesImport;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

use DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Division;
use App\Models\District;
use App\Models\Upazila;
use App\Models\ActivityCategory;
use App\Models\Temple;
use App\Models\TempleActivities;
use App\Models\TempleGallery;

class TempleController extends Controller
{
    public function all(Request $request){
        $user = Auth::user();

        // Check if user is Admin or Super Admin (role_id 1 or 2)
        if ($user->role_id == 1 || $user->role_id == 2) {
            // Admin and Super Admin can see all temples
            $query = Temple::with(['division', 'district', 'upazila', 'creator'])->orderBy('id', 'desc');

            // Apply filters based on query parameters
            if ($request->has('filter')) {
                $filter = $request->get('filter');

                if ($filter === 'pending_approval') {
                    $query->where(function($q) {
                        $q->where('status', 0)->orWhereNull('status');
                    });
                }
            }

            $temples = $query->get();
        } else {
            // Normal users can only see temples they created
            $temples = Temple::with(['division', 'district', 'upazila', 'creator'])
                ->where('created_by', $user->id)
                ->orderBy('id', 'desc')
                ->get();
        }

        return view('backend.pages.temple.all', compact('temples'));
    }

    public function create(){
        $divisions = Division::all();
        $districts = District::all();
        $upazilas = Upazila::all();
        $categories = ActivityCategory::with('activities')->get();
        return view('backend.pages.temple.create', compact('divisions', 'districts', 'upazilas', 'categories'));
    }

    public function importExcel(){
        return view('backend.pages.temple.import_excel');
    }

    public function store(Request $request){
        $obj = new Temple();
        $obj->name = $request->name;
        $obj->description = $request->description;
        $obj->address = $request->address;
        $obj->latitude = $request->latitude;
        $obj->longitude = $request->longitude;
        $obj->division_id = $request->division_id;
        $obj->district_id = $request->district_id;
        $obj->upazila_id = $request->upazila_id;
        $obj->union_parisad = $request->union_parisad;
        $obj->village = $request->village;
        $obj->city_corp = $request->city_corp;
        $obj->ward = $request->ward;
        $obj->thana = $request->thana;
        $obj->post_office = $request->post_office;
        $obj->zipcode = $request->zipcode;
        $obj->contact_name = $request->contact_name;
        $obj->contact_no = $request->contact_no;
        $obj->designation = $request->designation;
        $obj->nid = $request->nid;
        $obj->residential_facility = $request->has('residential_facility') ? True : False;

        // Handle main_picture upload
        if ($request->hasFile('main_picture')) {
            $mainPic = $request->file('main_picture');
            $mainPicName = Str::uuid() . '.' . $mainPic->getClientOriginalExtension();
            $mainPic->move(public_path('backend/uploads/temple/profile'), $mainPicName);
            $obj->main_picture = $mainPicName;
        }

        $user = Auth::user();

        // Auto-approve if created by Admin or Super Admin
        if ($user->role_id == 1 || $user->role_id == 2) {
            $obj->approval_status = 'approved';
            $obj->approved_by = $user->id;
            $obj->approved_at = now();
        } else {
            $obj->approval_status = 'pending';
        }

        // Set status to active (true) by default
        $obj->status = true;
        $obj->created_by = Auth::id();
        $obj->save();

        $activities_saved = False;

        foreach ($request->activities as $activity) {
            $activityObj = new TempleActivities();
            $activityObj->temple_id = $obj->id;
            $activityObj->activity_id = $activity;
            if($activityObj->save()){
                $activities_saved = True;
            }
        }

        $galley_saved = False;

        if ($request->hasFile('images')) {

            foreach ($request->file('images') as $image) {
                $uniqueName = Str::uuid() . '.' . $image->getClientOriginalExtension();

                $image->move(public_path('backend/uploads/temple/gallery'), $uniqueName);

                $gallerObj = new TempleGallery();
                $gallerObj->temple_id = $obj->id;
                $gallerObj->picture = $uniqueName;
                if($gallerObj->save()){
                    $galley_saved = True;
                }
            }
        }
        return redirect()->route('admin.temple.all');
    }

    public function import(Request $request){
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls'
        ]);

        try {
            Excel::import(new TemplesImport, $request->file('file'));
            return redirect()->route('admin.temple.import_excel')->with('success', 'Temples data imported successfully!');
        } catch (\Exception $e) {
            return redirect()->route('admin.temple.import_excel')->with('error', 'Error importing temples data: ' . $e->getMessage());
        }

        // Excel::import(new TemplesImport, $request->file('file'));

        // return back()->with('success', 'Temples imported successfully!');
    }

    public function approve($id){
        $user = Auth::user();

        // Only Admin and Super Admin can approve (role_id 1 or 2)
        if ($user->role_id != 1 && $user->role_id != 2) {
            return redirect()->route('admin.temple.all')->with('error', 'You do not have permission to approve temples.');
        }

        $temple = Temple::findOrFail($id);
        $temple->approval_status = 'approved';
        $temple->approved_by = Auth::id();
        $temple->approved_at = now();
        $temple->save();

        return redirect()->route('admin.temple.all')->with('success', 'Temple approved successfully.');
    }

    public function edit($id){
        $user = Auth::user();
        $temple = Temple::with(['gallery', 'activities'])->findOrFail($id);

        // Check if user has permission to edit this temple
        if ($user->role_id != 1 && $user->role_id != 2) {
            // Normal users can only edit their own temples
            if ($temple->created_by != $user->id) {
                return redirect()->route('admin.temple.all')->with('error', 'You do not have permission to edit this temple.');
            }
        }

        $divisions = Division::all();
        $districts = District::all();
        $upazilas = Upazila::all();
        $categories = ActivityCategory::with('activities')->get();
        return view('backend.pages.temple.edit', compact('temple', 'divisions', 'districts', 'upazilas', 'categories'));
    }

    public function update(Request $request, $id){
        $user = Auth::user();
        $temple = Temple::findOrFail($id);

        // Check if user has permission to update this temple
        if ($user->role_id != 1 && $user->role_id != 2) {
            // Normal users can only update their own temples
            if ($temple->created_by != $user->id) {
                return redirect()->route('admin.temple.all')->with('error', 'You do not have permission to update this temple.');
            }
        }

        $temple->name = $request->name;
        $temple->description = $request->description;
        $temple->address = $request->address;
        $temple->latitude = $request->latitude;
        $temple->longitude = $request->longitude;
        $temple->division_id = $request->division_id;
        $temple->district_id = $request->district_id;
        $temple->upazila_id = $request->upazila_id;
        $temple->union_parisad = $request->union_parisad;
        $temple->village = $request->village;
        $temple->city_corp = $request->city_corp;
        $temple->ward = $request->ward;
        $temple->thana = $request->thana;
        $temple->post_office = $request->post_office;
        $temple->zipcode = $request->zipcode;
        $temple->contact_name = $request->contact_name;
        $temple->contact_no = $request->contact_no;
        $temple->designation = $request->designation;
        $temple->nid = $request->nid;
        $temple->residential_facility = $request->has('residential_facility') ? True : False;
        // Handle main_picture upload (replace old if new uploaded)
        if ($request->hasFile('main_picture')) {
            // Delete old file if exists
            if ($temple->main_picture && file_exists(public_path('backend/uploads/temple/profile/' . $temple->main_picture))) {
                @unlink(public_path('backend/uploads/temple/profile/' . $temple->main_picture));
            }
            $mainPic = $request->file('main_picture');
            $mainPicName = Str::uuid() . '.' . $mainPic->getClientOriginalExtension();
            $mainPic->move(public_path('backend/uploads/temple/profile'), $mainPicName);
            $temple->main_picture = $mainPicName;
        }

        $temple->updated_by = Auth::id();
        $temple->save();

        // Update activities
        TempleActivities::where('temple_id', $temple->id)->delete();
        if ($request->activities) {
            foreach ($request->activities as $activity) {
                $activityObj = new TempleActivities();
                $activityObj->temple_id = $temple->id;
                $activityObj->activity_id = $activity;
                $activityObj->save();
            }
        }

        // Add new gallery images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $uniqueName = Str::uuid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('backend/uploads/temple/gallery'), $uniqueName);

                $gallerObj = new TempleGallery();
                $gallerObj->temple_id = $temple->id;
                $gallerObj->picture = $uniqueName;
                $gallerObj->save();
            }
        }

        return redirect()->route('admin.temple.all')->with('success', 'Temple updated successfully.');
    }
    public function destroy($id){
        $user = Auth::user();
        $temple = Temple::with('gallery')->findOrFail($id);

        // Check if user has permission to delete this temple
        if ($user->role_id != 1 && $user->role_id != 2) {
            // Normal users can only delete their own temples
            if ($temple->created_by != $user->id) {
                return redirect()->route('admin.temple.all')->with('error', 'You do not have permission to delete this temple.');
            }
        }

        // Delete main picture file if exists
        if ($temple->main_picture && file_exists(public_path('backend/uploads/temple/profile/' . $temple->main_picture))) {
            @unlink(public_path('backend/uploads/temple/profile/' . $temple->main_picture));
        }

        // Delete gallery images from directory
        if ($temple->gallery && count($temple->gallery)) {
            foreach ($temple->gallery as $gallery) {
                $galleryPath = public_path('backend/uploads/temple/gallery/' . $gallery->picture);
                if (file_exists($galleryPath)) {
                    @unlink($galleryPath);
                }
                $gallery->delete();
            }
        }

        // Delete related activities
        \App\Models\TempleActivities::where('temple_id', $temple->id)->delete();

        $temple->delete();
        return redirect()->route('admin.temple.all')->with('success', 'Temple and all related files deleted successfully.');
    }

    public function toggleStatus($id)
    {
        try {
            $temple = Temple::findOrFail($id);
            $user = Auth::user();

            // Check if user has permission to toggle status
            // Only admin, super admin, or the owner can toggle status
            if ($user->role_id != 1 && $user->role_id != 2) {
                // Check if user is the owner of the temple
                if ($temple->created_by != $user->id) {
                    return redirect()->route('admin.temple.all')->with('error', 'You do not have permission to toggle this temple status.');
                }
            }

            // Toggle the status
            $temple->status = !$temple->status;
            $temple->updated_by = Auth::id();
            $temple->save();

            $statusText = $temple->status ? 'activated' : 'deactivated';
            return redirect()->route('admin.temple.all')->with('success', 'Temple ' . $statusText . ' successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.temple.all')->with('error', 'Failed to toggle temple status: ' . $e->getMessage());
        }
    }
}
