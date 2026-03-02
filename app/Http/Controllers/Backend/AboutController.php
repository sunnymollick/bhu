<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AboutController extends Controller
{
    /**
     * Display a listing of about content.
     */
    public function index()
    {
        $abouts = About::orderBy('created_at', 'desc')->paginate(15);
        return view('backend.pages.about.index', compact('abouts'));
    }

    /**
     * Show the form for creating new about content.
     */
    public function create()
    {
        return view('backend.pages.about.create');
    }

    /**
     * Store a newly created about content.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'short_description' => 'nullable|string|max:1000',
            'who_we_are_title' => 'nullable|string|max:255',
            'who_we_are_content' => 'nullable|string',
            'mission_title' => 'nullable|string|max:255',
            'mission_content' => 'nullable|string',
            'gallery' => 'nullable|array',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            // Handle gallery image uploads
            $galleryPaths = [];
            if ($request->hasFile('gallery')) {
                foreach ($request->file('gallery') as $image) {
                    if ($image) {
                        $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                        $path = $image->storeAs('about/gallery', $filename, 'public');
                        $galleryPaths[] = $path;
                    }
                }
            }

            About::create([
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'short_description' => $request->short_description,
                'who_we_are_title' => $request->who_we_are_title,
                'who_we_are_content' => $request->who_we_are_content,
                'mission_title' => $request->mission_title,
                'mission_content' => $request->mission_content,
                'gallery' => !empty($galleryPaths) ? $galleryPaths : null,
                'status' => $request->status,
                'created_by' => Auth::id(),
                'updated_by' => Auth::id(),
            ]);

            // Clear about page cache
            Cache::forget('about_content');

            return redirect()->route('admin.about.index')
                ->with('success', 'About content created successfully');

        } catch (\Exception $e) {
            Log::error('About creation error: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Failed to create about content')
                ->withInput();
        }
    }

    /**
     * Show the form for editing about content.
     */
    public function edit($id)
    {
        $about = About::findOrFail($id);
        return view('backend.pages.about.edit', compact('about'));
    }

    /**
     * Update the specified about content.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'short_description' => 'nullable|string|max:1000',
            'who_we_are_title' => 'nullable|string|max:255',
            'who_we_are_content' => 'nullable|string',
            'mission_title' => 'nullable|string|max:255',
            'mission_content' => 'nullable|string',
            'gallery' => 'nullable|array',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'existing_gallery' => 'nullable|array',
            'status' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $about = About::findOrFail($id);

            // Start with existing gallery images that weren't removed
            $galleryPaths = $request->existing_gallery ?? [];

            // Handle new gallery image uploads and add them to the existing ones
            if ($request->hasFile('gallery')) {
                foreach ($request->file('gallery') as $image) {
                    if ($image) {
                        // Upload new image
                        $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                        $path = $image->storeAs('about/gallery', $filename, 'public');
                        $galleryPaths[] = $path;
                    }
                }
            }

            // Delete old images that are no longer in the gallery
            $oldGallery = $about->gallery ?? [];
            $imagesToDelete = array_diff($oldGallery, $galleryPaths);
            foreach ($imagesToDelete as $imagePath) {
                $fullPath = storage_path('app/public/' . $imagePath);
                if (file_exists($fullPath)) {
                    @unlink($fullPath);
                }
            }

            // Remove empty values and reindex array
            $galleryPaths = array_values(array_filter($galleryPaths));

            $about->update([
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'short_description' => $request->short_description,
                'who_we_are_title' => $request->who_we_are_title,
                'who_we_are_content' => $request->who_we_are_content,
                'mission_title' => $request->mission_title,
                'mission_content' => $request->mission_content,
                'gallery' => !empty($galleryPaths) ? $galleryPaths : null,
                'status' => $request->status,
                'updated_by' => Auth::id(),
            ]);

            // Clear about page cache
            Cache::forget('about_content');

            return redirect()->route('admin.about.index')
                ->with('success', 'About content updated successfully');

        } catch (\Exception $e) {
            Log::error('About update error: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Failed to update about content')
                ->withInput();
        }
    }

    /**
     * Remove the specified about content.
     */
    public function destroy($id)
    {
        try {
            $about = About::findOrFail($id);

            // Delete associated gallery images
            if (!empty($about->gallery)) {
                foreach ($about->gallery as $imagePath) {
                    $fullPath = storage_path('app/public/' . $imagePath);
                    if (file_exists($fullPath)) {
                        @unlink($fullPath);
                    }
                }
            }

            $about->delete();

            // Clear about page cache
            Cache::forget('about_content');

            return redirect()->route('admin.about.index')
                ->with('success', 'About content deleted successfully');

        } catch (\Exception $e) {
            Log::error('About deletion error: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Failed to delete about content');
        }
    }

    /**
     * Toggle the status of about content.
     */
    public function toggleStatus($id)
    {
        try {
            $about = About::findOrFail($id);
            $about->update([
                'status' => !$about->status,
                'updated_by' => Auth::id(),
            ]);

            // Clear about page cache
            Cache::forget('about_content');

            return redirect()->route('admin.about.index')
                ->with('success', 'Status updated successfully');

        } catch (\Exception $e) {
            Log::error('About status toggle error: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Failed to update status');
        }
    }
}
