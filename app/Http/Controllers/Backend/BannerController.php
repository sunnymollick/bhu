<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Banner;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class BannerController extends Controller
{
    public function all()
    {
        $banners = Banner::orderBy('sort_order')->get();
        return view('backend.pages.banner.all', compact('banners'));
    }

    public function create()
    {
        return view('backend.pages.banner.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image_name' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'sort_order' => 'nullable|integer',
            'status' => 'nullable|boolean',
            'banner_text' => 'nullable|string|max:255',
            'title' => 'nullable|string|max:255',
            'title_bn' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:500',
            'subtitle_bn' => 'nullable|string|max:500',
            'button_text_1' => 'nullable|string|max:100',
            'button_link_1' => 'nullable|string|max:255',
            'button_text_2' => 'nullable|string|max:100',
            'button_link_2' => 'nullable|string|max:255',
        ]);

        $banner = new Banner();
        $banner->sort_order = $request->sort_order ?? 0;
        $banner->status = $request->has('status') ? 1 : 0;
        $banner->banner_text = $request->banner_text;
        $banner->title = $request->title;
        $banner->title_bn = $request->title_bn;
        $banner->subtitle = $request->subtitle;
        $banner->subtitle_bn = $request->subtitle_bn;
        $banner->button_text_1 = $request->button_text_1;
        $banner->button_link_1 = $request->button_link_1;
        $banner->button_text_2 = $request->button_text_2;
        $banner->button_link_2 = $request->button_link_2;
        $banner->location = 'home'; // Banners only for home page
        $banner->created_by = Auth::id();

        // Handle image upload
        if ($request->hasFile('image_name')) {
            $image = $request->file('image_name');
            $imageName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('backend/uploads/banner'), $imageName);
            $banner->image_name = $imageName;
        }

        $banner->save();

        // Clear home banners cache
        Cache::forget('home_banners');

        return redirect()->route('admin.banner.all')->with('success', 'Banner created successfully.');
    }

    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
        return view('backend.pages.banner.edit', compact('banner'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'image_name' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'sort_order' => 'nullable|integer',
            'status' => 'nullable|boolean',
            'banner_text' => 'nullable|string|max:255',
            'title' => 'nullable|string|max:255',
            'title_bn' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:500',
            'subtitle_bn' => 'nullable|string|max:500',
            'button_text_1' => 'nullable|string|max:100',
            'button_link_1' => 'nullable|string|max:255',
            'button_text_2' => 'nullable|string|max:100',
            'button_link_2' => 'nullable|string|max:255',
        ]);

        $banner = Banner::findOrFail($id);
        $banner->sort_order = $request->sort_order ?? 0;
        $banner->status = $request->has('status') ? 1 : 0;
        $banner->banner_text = $request->banner_text;
        $banner->title = $request->title;
        $banner->title_bn = $request->title_bn;
        $banner->subtitle = $request->subtitle;
        $banner->subtitle_bn = $request->subtitle_bn;
        $banner->button_text_1 = $request->button_text_1;
        $banner->button_link_1 = $request->button_link_1;
        $banner->button_text_2 = $request->button_text_2;
        $banner->button_link_2 = $request->button_link_2;
        $banner->location = 'home'; // Banners only for home page
        $banner->updated_by = Auth::id();

        // Handle image upload (replace old if new uploaded)
        if ($request->hasFile('image_name')) {
            // Delete old image if exists
            $oldPath = public_path('backend/uploads/banner/' . $banner->image_name);
            if ($banner->image_name && file_exists($oldPath)) {
                @unlink($oldPath);
            }
            $image = $request->file('image_name');
            $imageName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('backend/uploads/banner'), $imageName);
            $banner->image_name = $imageName;
        }

        $banner->save();

        // Clear home banners cache
        Cache::forget('home_banners');

        return redirect()->route('admin.banner.all')->with('success', 'Banner updated successfully.');
    }

    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);

        // Delete image file if exists
        $imagePath = public_path('backend/uploads/banner/' . $banner->image_name);
        if ($banner->image_name && file_exists($imagePath)) {
            @unlink($imagePath);
        }

        $banner->delete();

        // Clear home banners cache
        Cache::forget('home_banners');

        return redirect()->route('admin.banner.all')->with('success', 'Banner deleted successfully.');
    }
}
