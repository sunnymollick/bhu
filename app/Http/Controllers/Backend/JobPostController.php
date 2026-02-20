<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobPost;
use App\Models\Division;
use App\Models\District;
use App\Models\JobCategory;
use App\Models\JobIndustry;
use Illuminate\Support\Facades\Auth;
class JobPostController extends Controller
{
    public function all(Request $request){
        $userRole = Auth::user()->role?->name;

        // Admin and Super Admin can see all job posts
        if (in_array($userRole, ['Admin', 'Super Admin'])) {
            $query = JobPost::with('division', 'district', 'jobCategory', 'jobIndustry', 'user')->latest();

            // Apply filters based on query parameters
            if ($request->has('filter')) {
                $filter = $request->get('filter');

                if ($filter === 'pending_approval') {
                    $query->where(function($q) {
                        $q->where('is_approved', 0)->orWhereNull('is_approved');
                    });
                }
            }

            $jobPosts = $query->get();
        } else {
            // Regular users can only see their own job posts
            $jobPosts = JobPost::where('user_id', Auth::id())->with('division', 'district', 'jobCategory', 'jobIndustry')->latest()->get();
        }

        return view('backend.pages.job_post.all', compact('jobPosts'));
    }


    public function create(){
        $divisions = Division::all();
        $jobCategories = JobCategory::all();
        $jobIndustries = JobIndustry::all();
        return view('backend.pages.job_post.create', compact('divisions', 'jobCategories', 'jobIndustries'));
    }

    public function store(Request $request){
        $request->validate([
            'company' => 'required|string|max:255',
            'job_title' => 'required|string|max:255',
            'job_type' => 'required|in:full_time,part_time',
            'work_mode' => 'required|in:remote,in_person',
            'division_id' => 'nullable|exists:divisions,id',
            'district_id' => 'nullable|exists:districts,id',
            'job_category_id' => 'required|exists:job_categories,id',
            'job_industry_id' => 'required|exists:job_industries,id',
            'about' => 'nullable|string',
            'requirements' => 'nullable|string',
            'preferred_experience' => 'nullable|string',
            'responsibilities' => 'nullable|string',
            'why_join_us' => 'nullable|string',
        ]);

        $userRole = Auth::user()->role?->name;

        $job = new JobPost();
        $job->user_id = Auth::id();
        $job->company = $request->company;
        $job->job_title = $request->job_title;
        $job->job_type = $request->job_type;
        $job->work_mode = $request->work_mode;
        $job->division_id = $request->division_id;
        $job->district_id = $request->district_id;
        $job->job_category_id = $request->job_category_id;
        $job->job_industry_id = $request->job_industry_id;
        $job->about = $request->about;
        $job->requirements = $request->requirements;
        $job->preferred_experience = $request->preferred_experience;
        $job->responsibilities = $request->responsibilities;
        $job->why_join_us = $request->why_join_us;
        $job->deadline = $request->deadline;

        // Auto-approve if created by Admin or Super Admin
        if (in_array($userRole, ['Admin', 'Super Admin'])) {
            $job->is_approved = true;
        } else {
            $job->is_approved = false;
        }

        $job->save();

        $successMessage = in_array($userRole, ['Admin', 'Super Admin'])
            ? 'Job post created and approved successfully.'
            : 'Job post created successfully. Waiting for admin approval.';

        return redirect()->route('admin.job_post.all')->with('success', $successMessage);
    }

    public function edit($id){
        $userRole = Auth::user()->role?->name;

        // Admin and Super Admin can edit any job post
        if (in_array($userRole, ['Admin', 'Super Admin'])) {
            $job = JobPost::findOrFail($id);
        } else {
            // Regular users can only edit their own job posts
            $job = JobPost::where('user_id', Auth::id())->findOrFail($id);
        }

        $divisions = Division::all();
        $jobCategories = JobCategory::all();
        $jobIndustries = JobIndustry::all();

        // Get districts for the selected division if exists
        $districts = [];
        if ($job->division_id) {
            $districts = District::where('division_id', $job->division_id)->get();
        }

        return view('backend.pages.job_post.edit', compact('job', 'divisions', 'districts', 'jobCategories', 'jobIndustries'));
    }

    public function update(Request $request, $id){
        $userRole = Auth::user()->role?->name;

        // Admin and Super Admin can update any job post
        if (in_array($userRole, ['Admin', 'Super Admin'])) {
            $job = JobPost::findOrFail($id);
        } else {
            // Regular users can only update their own job posts
            $job = JobPost::where('user_id', Auth::id())->findOrFail($id);
        }

        $request->validate([
            'company' => 'required|string|max:255',
            'job_title' => 'required|string|max:255',
            'job_type' => 'required|in:full_time,part_time',
            'work_mode' => 'required|in:remote,in_person',
            'division_id' => 'nullable|exists:divisions,id',
            'district_id' => 'nullable|exists:districts,id',
            'job_category_id' => 'required|exists:job_categories,id',
            'job_industry_id' => 'required|exists:job_industries,id',
            'about' => 'nullable|string',
            'requirements' => 'nullable|string',
            'preferred_experience' => 'nullable|string',
            'responsibilities' => 'nullable|string',
            'why_join_us' => 'nullable|string',
            'deadline' => 'nullable|date',
        ]);

        $job->company = $request->company;
        $job->job_title = $request->job_title;
        $job->job_type = $request->job_type;
        $job->work_mode = $request->work_mode;
        $job->division_id = $request->division_id;
        $job->district_id = $request->district_id;
        $job->job_category_id = $request->job_category_id;
        $job->job_industry_id = $request->job_industry_id;
        $job->about = $request->about;
        $job->requirements = $request->requirements;
        $job->preferred_experience = $request->preferred_experience;
        $job->responsibilities = $request->responsibilities;
        $job->why_join_us = $request->why_join_us;
        $job->deadline = $request->deadline;
        $job->save();

        return redirect()->route('admin.job_post.all')->with('success', 'Job post updated successfully.');
    }

    public function destroy($id){
        $userRole = Auth::user()->role?->name;

        // Admin and Super Admin can delete any job post
        if (in_array($userRole, ['Admin', 'Super Admin'])) {
            $job = JobPost::findOrFail($id);
        } else {
            // Regular users can only delete their own job posts
            $job = JobPost::where('user_id', Auth::id())->findOrFail($id);
        }

        $job->delete();
        return redirect()->route('admin.job_post.all')->with('success', 'Job post deleted successfully.');
    }

    public function approve($id)
    {
        $userRole = Auth::user()->role?->name;

        // Only Admin and Super Admin can approve
        if (!in_array($userRole, ['Admin', 'Super Admin'])) {
            abort(403, 'Unauthorized action.');
        }

        $job = JobPost::findOrFail($id);
        $job->is_approved = true;
        $job->save();

        return redirect()->back()->with('success', 'Job post approved successfully.');
    }
}
