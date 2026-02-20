<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Banner;
use App\Models\Page;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BannerController extends Controller
{
    public function all()
    {
        $banners = Banner::with('page')->orderBy('sort_order')->get();
        return view('backend.pages.banner.all', compact('banners'));
    }

    public function create()
    {
        $pages = Page::all();
        return view('backend.pages.banner.create', compact('pages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image_name' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sort_order' => 'nullable|integer',
            'status' => 'nullable|boolean',
            'banner_text' => 'nullable|string|max:255',
            'page_id' => 'nullable|exists:pages,id',
        ]);

        $banner = new Banner();
        $banner->sort_order = $request->sort_order ?? 0;
        $banner->status = $request->has('status') ? 1 : 0;
        $banner->banner_text = $request->banner_text;
        $banner->page_id = $request->page_id;
        $banner->created_by = Auth::id();

        // Handle image upload
        if ($request->hasFile('image_name')) {
            $image = $request->file('image_name');
            $imageName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('backend/uploads/banner'), $imageName);
            $banner->image_name = $imageName;
        }

        $banner->save();

        return redirect()->route('admin.banner.all')->with('success', 'Banner created successfully.');
    }

    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
        $pages = Page::all();
        return view('backend.pages.banner.edit', compact('banner', 'pages'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'image_name' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sort_order' => 'nullable|integer',
            'status' => 'nullable|boolean',
            'banner_text' => 'nullable|string|max:255',
            'page_id' => 'nullable|exists:pages,id',
        ]);

        $banner = Banner::findOrFail($id);
        $banner->sort_order = $request->sort_order ?? 0;
        $banner->status = $request->has('status') ? 1 : 0;
        $banner->banner_text = $request->banner_text;
        $banner->page_id = $request->page_id;
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

        return redirect()->route('admin.banner.all')->with('success', 'Banner deleted successfully.');
    }
}
