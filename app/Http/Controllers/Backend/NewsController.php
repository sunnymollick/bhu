<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function all(Request $request){
        $userRole = Auth::user()->role?->name;

        // Admin/Super Admin can see all news, regular users see only their own
        if (in_array($userRole, ['Super Admin', 'Admin'])) {
            $query = News::with(['creator', 'approver'])->orderBy('id', 'desc');

            // Apply filters based on query parameters
            if ($request->has('filter')) {
                $filter = $request->get('filter');

                if ($filter === 'pending_approval') {
                    $query->where('status', 'pending');
                }
            }

            $newsList = $query->get();
        } else {
            $newsList = News::with(['creator', 'approver'])
                ->where('created_by', Auth::id())
                ->orderBy('id', 'desc')
                ->get();
        }

        return view('backend.pages.news.all', compact('newsList'));
    }

    public function create(){
        return view('backend.pages.news.create');
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'date_time' => 'required|date',
            'what' => 'required|string',
            'who' => 'required|string',
            'when' => 'required|string',
            'where' => 'required|string',
            'why' => 'required|string',
            'how' => 'required|string',
            'victim_testimony' => 'required|string',
            'witness_statement' => 'nullable|string',
            'opposition_reaction' => 'nullable|string',
            'government_response' => 'nullable|string',
            'media_coverage' => 'nullable|string',
            'contact' => 'nullable|string|max:255',
            'attachments.*' => 'nullable|file|max:10240',
            'is_confidential' => 'nullable|boolean',
            'final_news' => 'nullable|string',
        ]);

        $news = new News();
        $news->title = $request->title;
        $news->location = $request->location;
        $news->date_time = $request->date_time;
        $news->what = $request->what;
        $news->who = $request->who;
        $news->when = $request->when;
        $news->where = $request->where;
        $news->why = $request->why;
        $news->how = $request->how;
        $news->victim_testimony = $request->victim_testimony;
        $news->witness_statement = $request->witness_statement;
        $news->opposition_reaction = $request->opposition_reaction;
        $news->government_response = $request->government_response;
        $news->media_coverage = $request->media_coverage;
        $news->contact = $request->contact;
        $news->is_confidential = $request->has('is_confidential') ? 1 : 0;
        $news->created_by = Auth::id();

        // Auto-approve if created by Admin or Super Admin
        $userRole = Auth::user()->role?->name;
        if (in_array($userRole, ['Super Admin', 'Admin'])) {
            $news->status = 'approved';
            $news->approved_by = Auth::id();
            $news->approved_at = now();
        } else {
            $news->status = 'pending';
        }

        $news->final_news = $request->final_news;

        // Handle attachments
        $attachments = [];
        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $file) {
                $uniqueName = Str::uuid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('backend/uploads/news'), $uniqueName);
                $attachments[] = 'backend/uploads/news/' . $uniqueName;
            }
        }
        $news->attachments = $attachments; // <--- Store as array

        $news->save();

        $message = $news->status === 'approved'
            ? 'News created and approved successfully.'
            : 'News submitted successfully and is pending approval.';

        return redirect()->route('admin.news.all')->with('success', $message);
    }

    public function edit($id){
        $news = News::findOrFail($id);
        return view('backend.pages.news.edit', compact('news'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'date_time' => 'required|date',
            'what' => 'required|string',
            'who' => 'required|string',
            'when' => 'required|string',
            'where' => 'required|string',
            'why' => 'required|string',
            'how' => 'required|string',
            'victim_testimony' => 'required|string',
            'witness_statement' => 'nullable|string',
            'opposition_reaction' => 'nullable|string',
            'government_response' => 'nullable|string',
            'media_coverage' => 'nullable|string',
            'contact' => 'nullable|string|max:255',
            'attachments.*' => 'nullable|file|max:10240',
            'is_confidential' => 'nullable|boolean',
            'final_news' => 'nullable|string',
        ]);

        $news = News::findOrFail($id);
        $news->title = $request->title;
        $news->location = $request->location;
        $news->date_time = $request->date_time;
        $news->what = $request->what;
        $news->who = $request->who;
        $news->when = $request->when;
        $news->where = $request->where;
        $news->why = $request->why;
        $news->how = $request->how;
        $news->victim_testimony = $request->victim_testimony;
        $news->witness_statement = $request->witness_statement;
        $news->opposition_reaction = $request->opposition_reaction;
        $news->government_response = $request->government_response;
        $news->media_coverage = $request->media_coverage;
        $news->contact = $request->contact;
        $news->is_confidential = $request->has('is_confidential') ? 1 : 0;
        $news->final_news = $request->final_news;

        // Handle attachments: keep old, add new
        $attachments = is_array($news->attachments) ? $news->attachments : [];
        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $file) {
                $uniqueName = Str::uuid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('backend/uploads/news'), $uniqueName);
                $attachments[] = 'backend/uploads/news/' . $uniqueName;
            }
        }
        $news->attachments = $attachments; // <--- Store as array

        $news->edited_by = Auth::id();

        $news->save();

        return redirect()->route('admin.news.all')->with('success', 'News updated successfully.');
    }

    public function approve($id){
        $news = News::findOrFail($id);
        $news->status = 'approved';
        $news->approved_by = Auth::id();
        $news->approved_at = now();
        $news->save();
        return response()->json(['success' => true]);
    }

    public function destroy($id){
        $news = News::findOrFail($id);
        $attachments = is_array($news->attachments) ? $news->attachments : [];
        if ($attachments && is_array($attachments)) {
            foreach ($attachments as $file) {
                $filePath = public_path($file);
                if (file_exists($filePath)) {
                    @unlink($filePath);
                }
            }
        }
        $news->delete();
        return redirect()->route('admin.news.all')->with('success', 'News and all related files deleted successfully.');
    }
}
