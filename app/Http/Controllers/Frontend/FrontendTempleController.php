<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Temple;
use App\Models\Division;
use App\Models\District;
use App\Models\Upazila;
use App\Models\ActivityCategory;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;

class FrontendTempleController extends Controller
{
    public function index()
    {
        return view('frontend.pages.home.index');
    }

    public function temples(Request $request)
    {
        // Fetch all divisions, districts, upazilas
        $divisions = Division::select('id', 'name')->get();
        $districts = District::select('id', 'division_id', 'name')->get();
        $upazilas = Upazila::select('id', 'district_id', 'name')->get();

        // Fetch activity categories with activities
        $activityCategories = ActivityCategory::with(['activities' => function($query) {
            $query->select('id', 'title', 'title_bn', 'activity_category_id');
        }])->select('id', 'name', 'name_bn')->get();

        // Get filtered and paginated temples
        $temples = $this->applyFilters($request)->paginate(9);

        // Apply same filters as main query, then limit for map visualization
        $templesData = $this->applyFilters($request, true)
            ->select('id', 'name', 'division_id', 'district_id', 'upazila_id', 'latitude', 'longitude', 'address', 'residential_facility')
            ->whereNotNull('latitude')
            ->whereNotNull('longitude')
            ->limit(1000)
            ->get()
            ->map(function($temple) {
                return [
                    'id' => $temple->id,
                    'name' => $temple->name,
                    'division_id' => $temple->division_id,
                    'district_id' => $temple->district_id,
                    'upazila_id' => $temple->upazila_id,
                    'lat' => (float) $temple->latitude,
                    'lng' => (float) $temple->longitude,
                    'address' => $temple->address,
                    'residential_facility' => $temple->residential_facility
                ];
            });

        return view('frontend.pages.temples.temples', compact('divisions', 'districts', 'upazilas', 'temples', 'templesData', 'activityCategories'));
    }

    public function filterTemples(Request $request)
    {
        // Create cache key based on all filter parameters
        $cacheKey = 'temples_filter_' . md5(serialize($request->all()));

        $temples = Cache::remember($cacheKey, 300, function() use ($request) {
            return $this->applyFilters($request)->paginate(9);
        });

        // Return HTML for temples grid and pagination
        $templesHtml = view('frontend.partials.temples-grid', compact('temples'))->render();
        $paginationHtml = view('frontend.partials.temples-pagination', compact('temples'))->render();

        return response()->json([
            'templesHtml' => $templesHtml,
            'paginationHtml' => $paginationHtml,
            'totalCount' => $temples->total()
        ]);
    }

    private function applyFilters(Request $request, $forMap = false)
    {

        if ($forMap) {
            $query = Temple::where('status', true)->where('approval_status', 'approved');
        } else {
            $query = Temple::with(['division', 'district', 'upazila', 'activities.activity'])
                ->where('status', true)
                ->where('approval_status', 'approved');
        }

        // Apply search query filter
        if ($request->filled('query')) {
            $searchQuery = $request->input('query');
            $query->where(function($q) use ($searchQuery) {
                // Prefix search (uses index efficiently)
            $q->where('name', 'LIKE', $searchQuery . '%')
                ->orWhere('name_bn', 'LIKE', $searchQuery . '%')
                // Fallback to full search
                ->orWhere('name', 'LIKE', '%' . $searchQuery . '%')
                ->orWhere('name_bn', 'LIKE', '%' . $searchQuery . '%')
                ->orWhere('address', 'LIKE', '%' . $searchQuery . '%')
                // Search by division name
                ->orWhereHas('division', function($subQ) use ($searchQuery) {
                    $subQ->where('name', 'LIKE', $searchQuery . '%')
                        ->orWhere('name', 'LIKE', '%' . $searchQuery . '%');
                })
                // Search by district name
                ->orWhereHas('district', function($subQ) use ($searchQuery) {
                    $subQ->where('name', 'LIKE', $searchQuery . '%')
                        ->orWhere('name', 'LIKE', '%' . $searchQuery . '%');
                })
                // Search by upazila name
                ->orWhereHas('upazila', function($subQ) use ($searchQuery) {
                    $subQ->where('name', 'LIKE', $searchQuery . '%')
                        ->orWhere('name', 'LIKE', '%' . $searchQuery . '%');
                });
            });
        }

        // Apply location filters
        if ($request->filled('division_id')) {
            $query->where('division_id', $request->division_id);
        }
        if ($request->filled('district_id')) {
            $query->where('district_id', $request->district_id);
        }
        if ($request->filled('upazila_id')) {
            $query->where('upazila_id', $request->upazila_id);
        }

        // Apply residential facility filter
        if ($request->has('residential_facility')) {
            $query->where('residential_facility', true);
        }

        // Apply activity filters (AND logic - temple must have ALL selected activities)
        $activityIds = $request->input('activities', []);
        if (!empty($activityIds)) {
            foreach ($activityIds as $activityId) {
                $query->whereHas('activities', function($q) use ($activityId) {
                    $q->where('activity_id', $activityId);
                });
            }
        }

        return $query->select('id', 'name', 'name_bn', 'division_id', 'district_id', 'upazila_id', 'address', 'main_picture');
    }

    public function searchTemples(Request $request)
    {
        $query = $request->get('query', '');

        if (strlen($query) < 2) {
            return response()->json([]);
        }

        $temples = Temple::where('status', true)
            ->where('approval_status', 'approved')
            ->where(function($q) use ($query) {
            $q->where('name', 'LIKE', '%' . $query . '%')
                ->orWhere('name_bn', 'LIKE', '%' . $query . '%')
                ->orWhere('address', 'LIKE', '%' . $query . '%')
                // Search by division name
                ->orWhereHas('division', function($subQ) use ($query) {
                    $subQ->where('name', 'LIKE', '%' . $query . '%')
                        ->orWhere('name_bn', 'LIKE', '%' . $query . '%');
                })
                // Search by district name
                ->orWhereHas('district', function($subQ) use ($query) {
                    $subQ->where('name', 'LIKE', '%' . $query . '%')
                        ->orWhere('name_bn', 'LIKE', '%' . $query . '%');
                })
                // Search by upazila name
                ->orWhereHas('upazila', function($subQ) use ($query) {
                    $subQ->where('name', 'LIKE', '%' . $query . '%')
                        ->orWhere('name_bn', 'LIKE', '%' . $query . '%');
                });
            })
            ->with(['division', 'district', 'upazila'])
            ->select('id', 'name', 'name_bn', 'address', 'division_id', 'district_id', 'upazila_id')
            ->limit(10)
            ->get()
            ->map(function($temple) {
                $location = collect([
                    $temple->upazila?->name,
                    $temple->district?->name,
                    $temple->division?->name
                ])->filter()->implode(', ');

                return [
                    'id' => $temple->id,
                    'name' => $temple->name,
                    'name_bn' => $temple->name_bn,
                    'address' => $temple->address,
                    'location' => $location,
                    'label' => $temple->name . ($temple->name_bn ? ' (' . $temple->name_bn . ')' : ''),
                    'value' => $temple->name
                ];
            });

        return response()->json($temples);
    }

    public function templeDetails($id)
    {
        // Fetch temple with all relationships
        $temple = Temple::with([
            'division',
            'district',
            'upazila',
            'activities.activity.activityCategory',
            'gallery'
        ])->findOrFail($id);

        // Fetch related temples (same district, limit 3)
        $relatedTemples = Temple::where('status', true)
            ->where('approval_status', 'approved')
            ->where('district_id', $temple->district_id)
            ->where('id', '!=', $temple->id)
            ->with(['district'])
            ->limit(3)
            ->get();

        // Get all gallery images
        $templeGallery = $temple->gallery()->where('status', true)->get();
        $eventGallery = collect(); // Empty collection for now

        // Get upcoming events for this temple
        $upcomingEvents = \App\Models\TempleEvent::where('temple_id', $id)
            ->where('status', true)
            ->where('event_date', '>=', now()->format('Y-m-d'))
            ->orderBy('event_date', 'asc')
            ->limit(10)
            ->get();

        return view('frontend.pages.temples.temple_details', compact(
            'temple',
            'relatedTemples',
            'templeGallery',
            'eventGallery',
            'upcomingEvents'
        ));
    }

    public function organizations(Request $request)
    {
        // Fetch all divisions, districts
        $divisions = Division::select('id', 'name')->get();
        $districts = District::select('id', 'division_id', 'name')->get();

        // Fetch business categories with businesses (category_type = 'business')
        $businessCategories = \App\Models\BusinessCategory::with(['businesses' => function($query) {
            $query->select('id', 'title', 'title_bn', 'business_category_id');
        }])
        ->where('category_type', 'business')
        ->select('id', 'name', 'name_bn')
        ->get();

        // Fetch religious categories with businesses (category_type = 'religious')
        $religiousCategories = \App\Models\BusinessCategory::with(['businesses' => function($query) {
            $query->select('id', 'title', 'title_bn', 'business_category_id');
        }])
        ->where('category_type', 'religious')
        ->select('id', 'name', 'name_bn')
        ->get();

        // Get filtered and paginated organizations
        $organizations = $this->applyOrganizationFilters($request)->paginate(9);

        return view('frontend.pages.organizations.organizations', compact('divisions', 'districts', 'organizations', 'businessCategories', 'religiousCategories'));
    }

    public function filterOrganizations(Request $request)
    {
        // Create cache key based on all filter parameters
        $cacheKey = 'organizations_filter_' . md5(serialize($request->all()));

        // Cache results for 5 minutes to improve performance
        $organizations = Cache::remember($cacheKey, 300, function() use ($request) {
            return $this->applyOrganizationFilters($request)->paginate(9);
        });

        // Return HTML for organizations grid and pagination
        $organizationsHtml = view('frontend.partials.organizations-grid', compact('organizations'))->render();
        $paginationHtml = view('frontend.partials.organizations-pagination', compact('organizations'))->render();

        return response()->json([
            'organizationsHtml' => $organizationsHtml,
            'paginationHtml' => $paginationHtml,
            'totalCount' => $organizations->total()
        ]);
    }

    private function applyOrganizationFilters(Request $request)
    {
        // Build query for organizations with filters
        $query = \App\Models\Organization::with(['division', 'district', 'businesses.business'])
            ->where('status', 'approved');

        // Apply search query filter
        if ($request->filled('query')) {
            $searchQuery = $request->input('query');
            $query->where(function($q) use ($searchQuery) {
                $q->where('name', 'LIKE', $searchQuery . '%')
                    ->orWhere('name', 'LIKE', '%' . $searchQuery . '%')
                    ->orWhere('address', 'LIKE', '%' . $searchQuery . '%')
                    ->orWhereHas('division', function($subQ) use ($searchQuery) {
                        $subQ->where('name', 'LIKE', $searchQuery . '%')
                            ->orWhere('name', 'LIKE', '%' . $searchQuery . '%');
                    })
                    ->orWhereHas('district', function($subQ) use ($searchQuery) {
                        $subQ->where('name', 'LIKE', $searchQuery . '%')
                            ->orWhere('name', 'LIKE', '%' . $searchQuery . '%');
                    });
            });
        }

        // Apply location filters
        if ($request->filled('division_id')) {
            $query->where('division_id', $request->division_id);
        }
        if ($request->filled('district_id')) {
            $query->where('district_id', $request->district_id);
        }

        // Apply organization type filter
        if ($request->filled('organization_type')) {
            $query->where('organization_type', $request->organization_type);
        }

        $businessIds = $request->input('businesses', []);
        if (!empty($businessIds)) {
            foreach ($businessIds as $businessId) {
                $query->whereHas('businesses', function($q) use ($businessId) {
                    $q->where('business_id', $businessId);
                });
            }
        }

        return $query->orderBy('id', 'desc')
            ->select('id', 'name', 'division_id', 'district_id', 'address', 'logo_url', 'phone', 'email', 'website');
    }

    public function searchOrganizations(Request $request)
    {
        $query = $request->get('query', '');

        if (strlen($query) < 2) {
            return response()->json([]);
        }

        $organizations = \App\Models\Organization::where('status', 'approved')
            ->where(function($q) use ($query) {
                $q->where('name', 'LIKE', '%' . $query . '%')
                    ->orWhere('address', 'LIKE', '%' . $query . '%')
                    ->orWhereHas('division', function($subQ) use ($query) {
                        $subQ->where('name', 'LIKE', '%' . $query . '%');
                    })
                    ->orWhereHas('district', function($subQ) use ($query) {
                        $subQ->where('name', 'LIKE', '%' . $query . '%');
                    });
            })
            ->with(['division', 'district'])
            ->select('id', 'name', 'address', 'division_id', 'district_id')
            ->limit(10)
            ->get()
            ->map(function($organization) {
                $location = collect([
                    $organization->district?->name,
                    $organization->division?->name
                ])->filter()->implode(', ');

                return [
                    'id' => $organization->id,
                    'name' => $organization->name,
                    'address' => $organization->address,
                    'location' => $location,
                    'label' => $organization->name,
                    'value' => $organization->name
                ];
            });

        return response()->json($organizations);
    }

    public function organizationDetails($id)
    {
        // Fetch organization with all relationships
        $organization = \App\Models\Organization::with([
            'division',
            'district',
            'businesses.business.businessCategory'
        ])->findOrFail($id);

        // Get similar organizations - first try same division, district, and organization type
        $similarOrganizations = \App\Models\Organization::where('status', 'approved')
            ->where('id', '!=', $id)
            ->where('division_id', $organization->division_id)
            ->where('district_id', $organization->district_id)
            ->where('organization_type', $organization->organization_type)
            ->with(['division', 'district'])
            ->inRandomOrder()
            ->limit(3)
            ->get();

        // If less than 3 found, get more from same division and organization type
        if ($similarOrganizations->count() < 3) {
            $excludeIds = $similarOrganizations->pluck('id')->push($id)->toArray();
            $remaining = 3 - $similarOrganizations->count();

            $additionalOrgs = \App\Models\Organization::where('status', 'approved')
                ->whereNotIn('id', $excludeIds)
                ->where('division_id', $organization->division_id)
                ->where('organization_type', $organization->organization_type)
                ->with(['division', 'district'])
                ->inRandomOrder()
                ->limit($remaining)
                ->get();

            $similarOrganizations = $similarOrganizations->merge($additionalOrgs);
        }

        // Group businesses by category and separate by category type
        $businessCategories = [];
        $religiousCategories = [];

        foreach ($organization->businesses as $orgBusiness) {
            if ($orgBusiness->business && $orgBusiness->business->businessCategory) {
                $category = $orgBusiness->business->businessCategory;
                $categoryName = $category->name;
                $categoryType = $category->category_type ?? 'business';

                if ($categoryType === 'religious') {
                    if (!isset($religiousCategories[$categoryName])) {
                        $religiousCategories[$categoryName] = [];
                    }
                    $religiousCategories[$categoryName][] = $orgBusiness->business->title;
                } else {
                    if (!isset($businessCategories[$categoryName])) {
                        $businessCategories[$categoryName] = [];
                    }
                    $businessCategories[$categoryName][] = $orgBusiness->business->title;
                }
            }
        }

        // Get upcoming events for this organization
        $upcomingEvents = \App\Models\OrganizationEvent::where('organization_id', $id)
            ->where('event_date', '>=', now()->format('Y-m-d'))
            ->orderBy('event_date', 'asc')
            ->limit(10)
            ->get();

        return view('frontend.pages.organizations.organization_details', compact('organization', 'similarOrganizations', 'businessCategories', 'religiousCategories', 'upcomingEvents'));
    }



    public function jobs(Request $request)
    {
        $jobCategories = \App\Models\JobCategory::all();
        $jobIndustries = \App\Models\JobIndustry::all();
        $divisions = \App\Models\Division::all();
        $districts = \App\Models\District::all();

        // Base query - only show approved job posts
        $query = \App\Models\JobPost::with(['division', 'district', 'jobCategory', 'jobIndustry'])
            ->where('is_approved', true);

        // Apply search
        if ($request->has('query') && $request->input('query') != '') {
            $searchTerm = $request->input('query');
            $query->where(function($q) use ($searchTerm) {
                $q->where('job_title', 'like', '%' . $searchTerm . '%')
                ->orWhere('company', 'like', '%' . $searchTerm . '%');
            });
        }

        // Apply sorting
        $sortBy = $request->get('sort_by', 'latest');
        switch ($sortBy) {
            case 'latest':
                $query->orderBy('created_at', 'desc');
                break;
            case 'oldest':
                $query->orderBy('created_at', 'asc');
                break;
            case 'deadline_soon':
                $query->orderBy('deadline', 'asc');
                break;
            case 'deadline_far':
                $query->orderBy('deadline', 'desc');
                break;
            default:
                $query->orderBy('created_at', 'desc');
        }

        // Paginate results
        $jobs = $query->paginate(10);

        return view('frontend.pages.jobs.jobs', compact('jobs', 'jobCategories', 'jobIndustries', 'divisions', 'districts'));
    }

    public function filterJobs(Request $request)
    {
        $query = \App\Models\JobPost::with(['division', 'district', 'jobCategory', 'jobIndustry'])
            ->where('is_approved', true);

        // Apply filters
        if ($request->job_category_id) {
            $query->where('job_category_id', $request->job_category_id);
        }

        if ($request->job_industry_id) {
            $query->where('job_industry_id', $request->job_industry_id);
        }

        if ($request->job_type) {
            $query->where('job_type', $request->job_type);
        }

        if ($request->work_mode) {
            $query->where('work_mode', $request->work_mode);
        }

        if ($request->division_id) {
            $query->where('division_id', $request->division_id);
        }

        if ($request->district_id) {
            $query->where('district_id', $request->district_id);
        }

        // Apply search
        if ($request->has('query') && $request->input('query') != '') {
            $searchTerm = $request->input('query');
            $query->where(function($q) use ($searchTerm) {
                $q->where('job_title', 'like', '%' . $searchTerm . '%')
                    ->orWhere('company', 'like', '%' . $searchTerm . '%');
            });
        }

        // Apply sorting
        $sortBy = $request->get('sort_by', 'latest');
        switch ($sortBy) {
            case 'latest':
                $query->orderBy('created_at', 'desc');
                break;
            case 'oldest':
                $query->orderBy('created_at', 'asc');
                break;
            case 'deadline_soon':
                $query->orderBy('deadline', 'asc');
                break;
            case 'deadline_far':
                $query->orderBy('deadline', 'desc');
                break;
            default:
                $query->orderBy('created_at', 'desc');
        }

        $jobs = $query->paginate(10);

        $gridHtml = view('frontend.partials.jobs-grid', compact('jobs'))->render();
        $paginationHtml = view('frontend.partials.jobs-pagination', compact('jobs'))->render();

        return response()->json([
            'grid' => $gridHtml,
            'pagination' => $paginationHtml,
            'count' => [
                'from' => $jobs->firstItem() ?? 0,
                'to' => $jobs->lastItem() ?? 0,
                'total' => $jobs->total()
            ]
        ]);
    }

    public function searchJobs(Request $request)
    {
        $searchTerm = $request->input('query');

        $jobs = \App\Models\JobPost::with(['division', 'district', 'jobCategory', 'jobIndustry'])
            ->where('is_approved', true)
            ->where(function($query) use ($searchTerm) {
                $query->where('job_title', 'like', '%' . $searchTerm . '%')
                    ->orWhere('company', 'like', '%' . $searchTerm . '%');
            })
            ->get();

        $results = $jobs->map(function($job) {
            return [
                'id' => $job->id,
                'title' => $job->job_title,
                'company' => $job->company,
                'location' => ($job->district ? $job->district->name : '') .
                            ($job->division && $job->district ? ', ' : '') .
                            ($job->division ? $job->division->name : ''),
            ];
        });

        return response()->json($results);
    }

    public function jobDetails($id)
    {
        $job = \App\Models\JobPost::with(['jobCategory', 'jobIndustry', 'division', 'district'])
            ->where('is_approved', true)
            ->findOrFail($id);

        // Get similar jobs (same category or industry, exclude current job, only approved)
        $similarJobs = \App\Models\JobPost::with(['jobCategory', 'division', 'district'])
            ->where('is_approved', true)
            ->where('id', '!=', $id)
            ->where(function($query) use ($job) {
                $query->where('job_category_id', $job->job_category_id)
                    ->orWhere('job_industry_id', $job->job_industry_id);
            })
            ->limit(6)
            ->get();

        return view('frontend.pages.jobs.job_details', compact('job', 'similarJobs'));
    }



    public function allEvents(Request $request)
    {
        // Get organization events
        $organizationEventsQuery = \App\Models\OrganizationEvent::with(['organization'])
            ->where('status', true)
            ->where('event_date', '>=', now()->format('Y-m-d'))
            ->whereHas('organization', function($q) {
                $q->whereNotNull('approved_by');
            });

        // Get temple events
        $templeEventsQuery = \App\Models\TempleEvent::with(['temple'])
            ->where('status', true)
            ->where('event_date', '>=', now()->format('Y-m-d'))
            ->whereHas('temple', function($q) {
                $q->whereNotNull('approved_by');
            });

        // Filter by type (organization or temple)
        if ($request->has('type') && $request->type != '') {
            if ($request->type === 'temple') {
                // Only show temple events
                $organizationEventsQuery->whereRaw('1 = 0'); // Empty result
            } elseif ($request->type === 'organization') {
                // Only show organization events
                $templeEventsQuery->whereRaw('1 = 0'); // Empty result
            }
        }

        // Filter by temple_id if provided
        if ($request->has('temple_id') && $request->temple_id != '') {
            $templeEventsQuery->where('temple_id', $request->temple_id);
            // Don't include organization events when filtering by temple
            $organizationEventsQuery->whereRaw('1 = 0'); // Empty result
        }

        // Filter by organization_id if provided
        if ($request->has('organization_id') && $request->organization_id != '') {
            $organizationEventsQuery->where('organization_id', $request->organization_id);
            // Don't include temple events when filtering by organization
            $templeEventsQuery->whereRaw('1 = 0'); // Empty result
        }

        // Apply search filter to both
        if ($request->has('search') && $request->search != '') {
            $searchTerm = $request->search;
            $organizationEventsQuery->where(function($q) use ($searchTerm) {
                $q->where('event_name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('description', 'like', '%' . $searchTerm . '%')
                    ->orWhere('short_description', 'like', '%' . $searchTerm . '%')
                    ->orWhere('location', 'like', '%' . $searchTerm . '%');
            });

            $templeEventsQuery->where(function($q) use ($searchTerm) {
                $q->where('event_name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('description', 'like', '%' . $searchTerm . '%')
                    ->orWhere('short_description', 'like', '%' . $searchTerm . '%')
                    ->orWhere('location', 'like', '%' . $searchTerm . '%');
            });
        }

        // Get organization events
        $organizationEvents = $organizationEventsQuery->get();

        // Get temple events
        $templeEvents = $templeEventsQuery->get();

        // If autocomplete request, return suggestions
        if ($request->ajax() && $request->get('autocomplete') == '1') {
            $allEvents = collect($organizationEvents)->merge($templeEvents)
                ->sortBy('event_date')
                ->take(10)
                ->values();

            return response()->json([
                'suggestions' => $allEvents
            ]);
        }

        // Combine and sort by date
        $allEvents = collect($organizationEvents)->merge($templeEvents)
            ->sortBy('event_date')
            ->values();

        // Paginate manually
        $page = $request->get('page', 1);
        $perPage = 9;
        $paginatedEvents = $allEvents->forPage($page, $perPage);

        // Create manual pagination
        $events = new \Illuminate\Pagination\Paginator(
            $paginatedEvents,
            $perPage,
            $page,
            [
                'path' => route('frontend.events'),
                'query' => $request->query(),
            ]
        );

        // Get recent events from both sources
        $recentOrganizationEvents = \App\Models\OrganizationEvent::with(['organization'])
            ->where('status', true)
            ->where('event_date', '>=', now()->format('Y-m-d'))
            ->whereHas('organization', function($q) {
                $q->whereNotNull('approved_by');
            })
            ->orderBy('event_date', 'asc')
            ->limit(3)
            ->get();

        $recentTempleEvents = \App\Models\TempleEvent::with(['temple'])
            ->where('status', true)
            ->where('event_date', '>=', now()->format('Y-m-d'))
            ->whereHas('temple', function($q) {
                $q->whereNotNull('approved_by');
            })
            ->orderBy('event_date', 'asc')
            ->limit(3)
            ->get();

        $recentEvents = collect($recentOrganizationEvents)
            ->merge($recentTempleEvents)
            ->sortBy('event_date')
            ->take(5)
            ->values();

        // If AJAX request for filtered events
        if ($request->ajax() && $request->get('ajax') == '1') {
            $html = view('frontend.pages.events.partials.events_grid', compact('events'))->render();
            return response()->json([
                'success' => true,
                'html' => $html
            ]);
        }

        // If AJAX request for all events
        if ($request->ajax() && $request->get('show_all') == '1') {
            // Get all events beyond the initial 5
            $allRecentOrganizationEvents = \App\Models\OrganizationEvent::with(['organization'])
                ->where('status', true)
                ->where('event_date', '>=', now()->format('Y-m-d'))
                ->whereHas('organization', function($q) {
                    $q->whereNotNull('approved_by');
                })
                ->orderBy('event_date', 'asc')
                ->skip(3) // Skip the first 3 already shown
                ->take(20) // Get next 20 events
                ->get();

            $allRecentTempleEvents = \App\Models\TempleEvent::with(['temple'])
                ->where('status', true)
                ->where('event_date', '>=', now()->format('Y-m-d'))
                ->whereHas('temple', function($q) {
                    $q->whereNotNull('approved_by');
                })
                ->orderBy('event_date', 'asc')
                ->skip(3) // Skip the first 3 already shown
                ->take(20) // Get next 20 events
                ->get();

            $additionalEvents = collect($allRecentOrganizationEvents)
                ->merge($allRecentTempleEvents)
                ->sortBy('event_date')
                ->take(20)
                ->values();

            return response()->json([
                'success' => true,
                'events' => $additionalEvents
            ]);
        }

        return view('frontend.pages.events.all_events', compact('events', 'recentEvents'));
    }

    public function eventDetailsUnified($type, $id)
    {
        // Get event based on type
        if ($type === 'temple') {
            $event = \App\Models\TempleEvent::with(['temple'])->findOrFail($id);
            $galleryImages = \App\Models\TempleEventGallery::where('temple_event_id', $id)->get();
            $relatedEvents = \App\Models\TempleEvent::where('temple_id', $event->temple_id)
                ->where('id', '!=', $id)
                ->where('status', true)
                ->where('event_date', '>=', now()->format('Y-m-d'))
                ->orderBy('event_date', 'asc')
                ->limit(3)
                ->get();
        } else {
            $event = \App\Models\OrganizationEvent::with(['organization'])->findOrFail($id);
            $galleryImages = \App\Models\OrganizationEventGallery::where('organization_event_id', $id)->get();
            $relatedEvents = \App\Models\OrganizationEvent::where('organization_id', $event->organization_id)
                ->where('id', '!=', $id)
                ->where('event_date', '>=', now()->format('Y-m-d'))
                ->orderBy('event_date', 'asc')
                ->limit(3)
                ->get();
        }

        return view('frontend.pages.events.event_details_unified', compact('event', 'galleryImages', 'relatedEvents', 'type'));
    }
}


