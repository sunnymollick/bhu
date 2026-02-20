<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Page;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
     public function all()
    {
        $posts = Post::with('page')->orderBy('id', 'desc')->get();
        return view('backend.pages.post.all', compact('posts'));
    }

    public function create()
    {
        $pages = Page::all();
        return view('backend.pages.post.create', compact('pages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'short_title' => 'nullable|string|max:255',
            'short_description1' => 'nullable|string|max:255',
            'short_description2' => 'nullable|string|max:255',
            'description1' => 'nullable|string',
            'description2' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gallery_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'page_id' => 'nullable|exists:pages,id',
            'status' => 'nullable|boolean',
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->short_title = $request->short_title;
        $post->short_description1 = $request->short_description1;
        $post->short_description2 = $request->short_description2;
        $post->description1 = $request->description1;
        $post->description2 = $request->description2;
        $post->page_id = $request->page_id;
        $post->status = $request->has('status') ? 1 : 0;
        $post->created_by = Auth::id();

        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $imgName = Str::uuid() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('backend/uploads/post'), $imgName);
            $post->image = $imgName;
        }

        $post->save();

        // Handle gallery images
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $galleryImg) {
                $galleryImgName = Str::uuid() . '.' . $galleryImg->getClientOriginalExtension();
                $galleryImg->move(public_path('backend/uploads/post/gallery'), $galleryImgName);

                PostGallery::create([
                    'post_id' => $post->id,
                    'image_location' => $galleryImgName,
                    'status' => 1,
                    'created_by' => Auth::id(),
                ]);
            }
        }

        return redirect()->route('admin.post.all')->with('success', 'Post created successfully.');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $pages = Page::all();
        return view('backend.pages.post.edit', compact('post', 'pages'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'short_title' => 'nullable|string|max:255',
            'short_description1' => 'nullable|string|max:255',
            'short_description2' => 'nullable|string|max:255',
            'description1' => 'nullable|string',
            'description2' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gallery_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'page_id' => 'nullable|exists:pages,id',
            'status' => 'nullable|boolean',
        ]);

        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->short_title = $request->short_title;
        $post->short_description1 = $request->short_description1;
        $post->short_description2 = $request->short_description2;
        $post->description1 = $request->description1;
        $post->description2 = $request->description2;
        $post->page_id = $request->page_id;
        $post->status = $request->has('status') ? 1 : 0;
        $post->updated_by = Auth::id();

        if ($request->hasFile('image')) {
            // Delete old image if exists
            $oldPath = public_path('backend/uploads/post/' . $post->image);
            if ($post->image && file_exists($oldPath)) {
                @unlink($oldPath);
            }
            $img = $request->file('image');
            $imgName = Str::uuid() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('backend/uploads/post'), $imgName);
            $post->image = $imgName;
        }

        $post->save();

        // Handle new gallery images
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $galleryImg) {
                $galleryImgName = Str::uuid() . '.' . $galleryImg->getClientOriginalExtension();
                $galleryImg->move(public_path('backend/uploads/post/gallery'), $galleryImgName);

                PostGallery::create([
                    'post_id' => $post->id,
                    'image_location' => $galleryImgName,
                    'status' => 1,
                    'created_by' => Auth::id(),
                ]);
            }
        }

        return redirect()->route('admin.post.all')->with('success', 'Post updated successfully.');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        // Delete main image file if exists
        $imgPath = public_path('backend/uploads/post/' . $post->image);
        if ($post->image && file_exists($imgPath)) {
            @unlink($imgPath);
        }
        // Delete gallery images
        foreach ($post->galleries as $gallery) {
            $galleryPath = public_path('backend/uploads/post/gallery/' . $gallery->image_location);
            if ($gallery->image_location && file_exists($galleryPath)) {
                @unlink($galleryPath);
            }
            $gallery->delete();
        }
        $post->delete();
        return redirect()->route('admin.post.all')->with('success', 'Post deleted successfully.');
    }
}
