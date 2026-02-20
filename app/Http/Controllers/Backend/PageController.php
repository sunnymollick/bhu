<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function all()
    {
        $pages = Page::orderBy('id', 'desc')->get();
        return view('backend.pages.page.all', compact('pages'));
    }

    public function create()
    {
        return view('backend.pages.page.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255|unique:pages,title',
        ]);

        $page = new Page();
        $page->title = $request->title;
        $page->slug = Str::slug($request->title);
        $page->status = $request->has('status') ? 1 : 0;
        $page->created_by = Auth::id();
        $page->save();

        return redirect()->route('admin.page.all')->with('success', 'Page created successfully.');
    }

    public function edit($id)
    {
        $page = Page::findOrFail($id);
        return view('backend.pages.page.edit', compact('page'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255|unique:pages,title,' . $id,
        ]);

        $page = Page::findOrFail($id);
        $page->title = $request->title;
        $page->slug = Str::slug($request->title);
        $page->status = $request->has('status') ? 1 : 0;
        $page->updated_by = Auth::id();
        $page->save();

        return redirect()->route('admin.page.all')->with('success', 'Page updated successfully.');
    }
}