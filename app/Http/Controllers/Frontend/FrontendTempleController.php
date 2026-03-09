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
        // Cache location dropdowns — rarely change (file store, forever)
        $divisions = Cache::store('file')->rememberForever('temple_divisions', function () {
            return Division::select('id', 'name')->get();
        });
        $districts = Cache::store('file')->rememberForever('temple_districts', function () {
            return District::select('id', 'division_id', 'name')->get();
        });
        $upazilas = Cache::store('file')->rememberForever('temple_upazilas', function () {
            return Upazila::select('id', 'district_id', 'name')->get();
        });

        // Cache used activity categories (1 hour)
        $activityCategories = Cache::store('file')->remember('temple_activity_cats', 3600, function () {
            return ActivityCategory::with(['activities' => function($query) {
                $query->select('id', 'title', 'title_bn', 'activity_category_id')
                      ->whereHas('temples');
            }])->select('id', 'name', 'name_bn')
              ->get()
              ->filter(fn($cat) => $cat->activities->isNotEmpty())
              ->values();
        });

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
        // Build a deterministic cache key from sorted, filtered input
        $filterParams = collect($request->only([
            'division_id', 'district_id', 'upazila_id',
            'residential_facility', 'activities', 'query', 'page'
        ]))->filter(function ($v) {
            return $v !== null && $v !== '' && $v !== [];
        })->sortKeys()->toArray();

        $cacheKey = 'temple_filter:' . md5(json_encode($filterParams));

        // Use file-based cache (no DB contention), 60s TTL
        $cached = Cache::store('file')->remember($cacheKey, 60, function () use ($request) {
            $temples = $this->applyFilters($request)->paginate(9);
            return [
                'templesHtml'    => view('frontend.partials.temples-grid', compact('temples'))->render(),
                'paginationHtml' => view('frontend.partials.temples-pagination', compact('temples'))->render(),
                'totalCount'     => $temples->total(),
            ];
        });

        return response()->json($cached);
    }

    private function applyFilters(Request $request, $forMap = false)
    {
        if ($forMap) {
            $query = Temple::where('status', true)->where('approval_status', 'approved');
        } else {
            // Only eager-load what the grid partial actually uses
            $query = Temple::with(['division:id,name', 'district:id,name', 'upazila:id,name'])
                ->where('status', true)
                ->where('approval_status', 'approved');
        }

        // Apply location filters FIRST (uses indexes, narrows dataset early)
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

        // Apply search LAST (most expensive — runs on the already-narrowed set)
        if ($request->filled('query')) {
            $searchQuery = $request->input('query');
            $query->where(function($q) use ($searchQuery) {
                // %keyword% already covers prefix matches — no need for duplicate clauses
                $q->where('name', 'LIKE', '%' . $searchQuery . '%')
                  ->orWhere('name_bn', 'LIKE', '%' . $searchQuery . '%')
                  ->orWhere('address', 'LIKE', '%' . $searchQuery . '%')
                  ->orWhereHas('division', function($subQ) use ($searchQuery) {
                      $subQ->where('name', 'LIKE', '%' . $searchQuery . '%');
                  })
                  ->orWhereHas('district', function($subQ) use ($searchQuery) {
                      $subQ->where('name', 'LIKE', '%' . $searchQuery . '%');
                  })
                  ->orWhereHas('upazila', function($subQ) use ($searchQuery) {
                      $subQ->where('name', 'LIKE', '%' . $searchQuery . '%');
                  });
            });
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
        // Cache location dropdowns — rarely change (file store, forever)
        $divisions = Cache::store('file')->rememberForever('org_divisions', function () {
            return Division::select('id', 'name')->get();
        });
        $districts = Cache::store('file')->rememberForever('org_districts', function () {
            return District::select('id', 'division_id', 'name')->get();
        });

        // Cache used business categories (1 hour)
        $businessCategories = Cache::store('file')->remember('org_biz_cats', 3600, function () {
            return \App\Models\BusinessCategory::with(['businesses' => function($query) {
                $query->select('id', 'title', 'title_bn', 'business_category_id')
                    ->whereHas('organizationBusinesses');
            }])
            ->where('category_type', 'business')
            ->select('id', 'name', 'name_bn')
            ->get()
            ->filter(fn($cat) => $cat->businesses->isNotEmpty())
            ->values();
        });

        // Cache used religious categories (1 hour)
        $religiousCategories = Cache::store('file')->remember('org_rel_cats', 3600, function () {
            return \App\Models\BusinessCategory::with(['businesses' => function($query) {
                $query->select('id', 'title', 'title_bn', 'business_category_id')
                    ->whereHas('organizationBusinesses');
            }])
            ->where('category_type', 'religious')
            ->select('id', 'name', 'name_bn')
            ->get()
            ->filter(fn($cat) => $cat->businesses->isNotEmpty())
            ->values();
        });

        // Get filtered and paginated organizations
        $organizations = $this->applyOrganizationFilters($request)->paginate(9);

        return view('frontend.pages.organizations.organizations', compact('divisions', 'districts', 'organizations', 'businessCategories', 'religiousCategories'));
    }

    public function filterOrganizations(Request $request)
    {
        // Deterministic sorted cache key (file-based to avoid DB session locking)
        $params = $request->only(['division_id', 'district_id', 'organization_type', 'businesses', 'query', 'page']);
        ksort($params);
        $cacheKey = 'org_filter_' . md5(json_encode($params));

        // Cache rendered HTML, not the Paginator object (avoids serialization issues)
        $cached = Cache::store('file')->remember($cacheKey, 60, function () use ($request) {
            $organizations = $this->applyOrganizationFilters($request)->paginate(9);
            return [
                'organizationsHtml' => view('frontend.partials.organizations-grid', compact('organizations'))->render(),
                'paginationHtml'    => view('frontend.partials.organizations-pagination', compact('organizations'))->render(),
                'totalCount'        => $organizations->total(),
            ];
        });

        return response()->json($cached);
    }

    private function applyOrganizationFilters(Request $request)
    {
        $query = \App\Models\Organization::with(['division:id,name', 'district:id,name', 'businesses.business'])
            ->where('status', 'approved');

        // Indexed column filters first
        if ($request->filled('division_id')) {
            $query->where('division_id', $request->division_id);
        }
        if ($request->filled('district_id')) {
            $query->where('district_id', $request->district_id);
        }
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

        // Expensive search last
        if ($request->filled('query')) {
            $searchQuery = $request->input('query');
            $query->where(function($q) use ($searchQuery) {
                $q->where('name', 'LIKE', '%' . $searchQuery . '%')
                    ->orWhere('address', 'LIKE', '%' . $searchQuery . '%')
                    ->orWhereHas('division', function($subQ) use ($searchQuery) {
                        $subQ->where('name', 'LIKE', '%' . $searchQuery . '%');
                    })
                    ->orWhereHas('district', function($subQ) use ($searchQuery) {
                        $subQ->where('name', 'LIKE', '%' . $searchQuery . '%');
                    });
            });
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
        $jobCategories = Cache::store('file')->rememberForever('job_categories', function () {
            return \App\Models\JobCategory::select('id', 'name')->get();
        });
        $jobIndustries = Cache::store('file')->rememberForever('job_industries', function () {
            return \App\Models\JobIndustry::select('id', 'name')->get();
        });
        $divisions = Cache::store('file')->rememberForever('job_divisions', function () {
            return \App\Models\Division::select('id', 'name')->get();
        });
        $districts = Cache::store('file')->rememberForever('job_districts', function () {
            return \App\Models\District::select('id', 'division_id', 'name')->get();
        });

        $jobs = $this->applyJobFilters($request)->paginate(10);

        return view('frontend.pages.jobs.jobs', compact('jobs', 'jobCategories', 'jobIndustries', 'divisions', 'districts'));
    }

    public function filterJobs(Request $request)
    {
        $params = $request->only(['job_category_id', 'job_industry_id', 'job_type', 'work_mode', 'division_id', 'district_id', 'query', 'sort_by', 'page']);
        ksort($params);
        $cacheKey = 'job_filter_' . md5(json_encode($params));

        $cached = Cache::store('file')->remember($cacheKey, 60, function () use ($request) {
            $jobs = $this->applyJobFilters($request)->paginate(10);
            return [
                'grid'       => view('frontend.partials.jobs-grid', compact('jobs'))->render(),
                'pagination' => view('frontend.partials.jobs-pagination', compact('jobs'))->render(),
                'count'      => [
                    'from'  => $jobs->firstItem() ?? 0,
                    'to'    => $jobs->lastItem() ?? 0,
                    'total' => $jobs->total(),
                ],
            ];
        });

        return response()->json($cached);
    }

    private function applyJobFilters(Request $request)
    {
        $query = \App\Models\JobPost::with(['division:id,name', 'district:id,name', 'jobCategory:id,name', 'jobIndustry:id,name'])
            ->where('is_approved', true);

        // Indexed column filters first
        if ($request->filled('job_category_id')) {
            $query->where('job_category_id', $request->job_category_id);
        }
        if ($request->filled('job_industry_id')) {
            $query->where('job_industry_id', $request->job_industry_id);
        }
        if ($request->filled('job_type')) {
            $query->where('job_type', $request->job_type);
        }
        if ($request->filled('work_mode')) {
            $query->where('work_mode', $request->work_mode);
        }
        if ($request->filled('division_id')) {
            $query->where('division_id', $request->division_id);
        }
        if ($request->filled('district_id')) {
            $query->where('district_id', $request->district_id);
        }

        // Expensive search last
        if ($request->filled('query')) {
            $searchTerm = $request->input('query');
            $query->where(function($q) use ($searchTerm) {
                $q->where('job_title', 'like', '%' . $searchTerm . '%')
                    ->orWhere('company', 'like', '%' . $searchTerm . '%');
            });
        }

        // Sorting
        $sortBy = $request->get('sort_by', 'latest');
        switch ($sortBy) {
            case 'oldest':        $query->orderBy('created_at', 'asc'); break;
            case 'deadline_soon': $query->orderBy('deadline', 'asc'); break;
            case 'deadline_far':  $query->orderBy('deadline', 'desc'); break;
            default:              $query->orderBy('created_at', 'desc');
        }

        return $query;
    }

    public function searchJobs(Request $request)
    {
        $searchTerm = $request->input('query');

        if (!$searchTerm || strlen($searchTerm) < 2) {
            return response()->json([]);
        }

        $jobs = \App\Models\JobPost::with(['division:id,name', 'district:id,name'])
            ->where('is_approved', true)
            ->where(function($query) use ($searchTerm) {
                $query->where('job_title', 'like', '%' . $searchTerm . '%')
                    ->orWhere('company', 'like', '%' . $searchTerm . '%');
            })
            ->select('id', 'job_title', 'company', 'division_id', 'district_id')
            ->limit(10)
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


