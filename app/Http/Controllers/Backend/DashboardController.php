<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Temple;
use App\Models\Organization;
use App\Models\JobPost;
use App\Models\Business;
use App\Models\Post;
use App\Models\News;
use App\Models\Contact;
use App\Models\Activity;
use App\Models\TempleEvent;
use App\Models\OrganizationEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $role = $user->role->name ?? 'User';

        $data = [
            'user' => $user,
            'role' => $role,
        ];

        try {
            if (in_array($role, ['Admin', 'Super Admin'])) {
                $data = array_merge($data, $this->getAdminDashboardData());
            } else {
                $data = array_merge($data, $this->getUserDashboardData($user));
            }
        } catch (\Exception $e) {
            $data['stats'] = [];
        }

        return view('backend.pages.dashboard', $data);
    }

    public function home()
    {
        return $this->index();
    }

    private function getAdminDashboardData()
    {
        try {
            $stats = [];

            // User stats
            try {
                $stats['total_users'] = User::count();
                $stats['verified_users'] = User::where('is_verified', 1)->count();
                // Only count pending users (is_verified is NULL), not rejected (is_verified = 0)
                $stats['pending_users'] = User::whereNull('is_verified')->count();
                // Count users who have verified email but pending admin approval
                $stats['pending_user_approvals'] = User::whereNotNull('email_verified_at')
                    ->where(function($query) {
                        $query->where('is_approved', 0)->orWhereNull('is_approved');
                    })
                    ->count();
            } catch (\Exception $e) {
                $stats['total_users'] = 0;
                $stats['verified_users'] = 0;
                $stats['pending_users'] = 0;
                $stats['pending_user_approvals'] = 0;
            }

            // Contact stats
            try {
                $stats['total_contacts'] = Contact::count();
                $stats['unread_contacts'] = Contact::where('status', 'unread')->count();
            } catch (\Exception $e) {
                $stats['total_contacts'] = 0;
                $stats['unread_contacts'] = 0;
            }

            // Temple stats
            try {
                $stats['total_temples'] = Temple::count();
                $stats['active_temples'] = Temple::where('status', 1)->count();
                $stats['pending_temple_approvals'] = Temple::where('status', 0)->orWhereNull('status')->count();
            } catch (\Exception $e) {
                $stats['total_temples'] = 0;
                $stats['active_temples'] = 0;
                $stats['pending_temple_approvals'] = 0;
            }

            // Organization stats
            try {
                $stats['total_organizations'] = Organization::count();
                $stats['approved_organizations'] = Organization::where('status', 'approved')->count();
                $stats['pending_organization_approvals'] = Organization::where('status', 'pending')->count();
            } catch (\Exception $e) {
                $stats['total_organizations'] = 0;
                $stats['approved_organizations'] = 0;
                $stats['pending_organization_approvals'] = 0;
            }

            // Job stats
            try {
                $stats['total_jobs'] = JobPost::count();
                $stats['approved_jobs'] = JobPost::where('is_approved', 1)->count();
                $stats['pending_job_approvals'] = JobPost::where('is_approved', 0)->orWhereNull('is_approved')->count();
            } catch (\Exception $e) {
                $stats['total_jobs'] = 0;
                $stats['approved_jobs'] = 0;
                $stats['pending_job_approvals'] = 0;
            }

            // Event stats (Temple + Organization Events)
            try {
                $pending_temple_events = TempleEvent::where('status', 0)->orWhereNull('status')->count();
                $pending_org_events = OrganizationEvent::where('status', 0)->orWhereNull('status')->count();
                $stats['pending_event_approvals'] = $pending_temple_events + $pending_org_events;
            } catch (\Exception $e) {
                $stats['pending_event_approvals'] = 0;
            }

            // News stats
            try {
                $stats['total_news'] = News::count();
                $stats['approved_news'] = News::where('status', 'approved')->count();
                $stats['pending_news_approvals'] = News::where('status', 'pending')->count();
            } catch (\Exception $e) {
                $stats['total_news'] = 0;
                $stats['approved_news'] = 0;
                $stats['pending_news_approvals'] = 0;
            }

            // Other stats
            try { $stats['total_posts'] = Post::count(); } catch (\Exception $e) { $stats['total_posts'] = 0; }

            // Get recent data
            $recent_users = collect([]);
            $pending_verifications = collect([]);
            $recent_contacts = collect([]);
            $recent_news = collect([]);

            try {
                // Show only email-verified users (except admin/superadmin)
                $recent_users = User::with('role')
                    ->where('created_at', '>=', Carbon::now()->subDays(7))
                    ->where(function($q) {
                        $q->whereIn('role_id', [1, 2]) // Admin or Super Admin
                          ->orWhereNotNull('email_verified_at'); // Or email verified users
                    })
                    ->orderBy('created_at', 'desc')
                    ->limit(10)
                    ->get();
            } catch (\Exception $e) {}

            try {
                // Only get users who are pending verification (is_verified is NULL), not rejected (is_verified = 0)
                // Also ensure they have verified their email (except admin/superadmin)
                $pending_verifications = User::with('role')
                    ->whereNull('is_verified')
                    ->where(function($q) {
                        $q->whereIn('role_id', [1, 2]) // Admin or Super Admin
                          ->orWhereNotNull('email_verified_at'); // Or email verified users
                    })
                    ->orderBy('created_at', 'desc')
                    ->limit(10)
                    ->get();
            } catch (\Exception $e) {}

            try {
                $recent_contacts = Contact::orderBy('created_at', 'desc')->limit(10)->get();
            } catch (\Exception $e) {}

            try {
                $recent_news = News::with('creator')->orderBy('created_at', 'desc')->limit(5)->get();
            } catch (\Exception $e) {}

            return [
                'stats' => $stats,
                'recent_users' => $recent_users,
                'pending_verifications' => $pending_verifications,
                'recent_contacts' => $recent_contacts,
                'recent_news' => $recent_news,
            ];
        } catch (\Exception $e) {
            return [
                'stats' => [],
                'recent_users' => collect([]),
                'pending_verifications' => collect([]),
                'recent_contacts' => collect([]),
                'recent_news' => collect([]),
            ];
        }
    }

    private function getUserDashboardData($user)
    {
        try {
            $stats = [
                'profile_completion' => $this->calculateProfileCompletion($user),
            ];

            // Count only items created by this user
            try { $stats['my_temples'] = Temple::where('created_by', $user->id)->count(); } catch (\Exception $e) { $stats['my_temples'] = 0; }
            try { $stats['my_organizations'] = Organization::where('created_by', $user->id)->count(); } catch (\Exception $e) { $stats['my_organizations'] = 0; }
            try { $stats['my_jobs'] = JobPost::where('user_id', $user->id)->count(); } catch (\Exception $e) { $stats['my_jobs'] = 0; }
            try {
                // Count temple events and organization events created by user
                $temple_events = TempleEvent::where('created_by', $user->id)->count();
                $org_events = OrganizationEvent::where('created_by', $user->id)->count();
                $stats['my_events'] = $temple_events + $org_events;
            } catch (\Exception $e) { $stats['my_events'] = 0; }

            $my_temples = collect([]);
            $my_organizations = collect([]);
            $my_jobs = collect([]);
            $my_activities = collect([]);

            try {
                $my_temples = Temple::where('created_by', $user->id)->orderBy('created_at', 'desc')->limit(5)->get();
            } catch (\Exception $e) {
                // Ignore
            }

            try {
                $my_organizations = Organization::where('created_by', $user->id)->orderBy('created_at', 'desc')->limit(5)->get();
            } catch (\Exception $e) {
                // Ignore
            }

            try {
                $my_jobs = JobPost::where('user_id', $user->id)->orderBy('created_at', 'desc')->limit(5)->get();
            } catch (\Exception $e) {
                // Ignore
            }

            try {
                // Get temple events and organization events created by user
                $temple_events = TempleEvent::where('created_by', $user->id)
                    ->with('temple')
                    ->orderBy('created_at', 'desc')
                    ->limit(3)
                    ->get()
                    ->map(function($event) {
                        $event->event_type = 'temple';
                        return $event;
                    });

                $org_events = OrganizationEvent::where('created_by', $user->id)
                    ->with('organization')
                    ->orderBy('created_at', 'desc')
                    ->limit(3)
                    ->get()
                    ->map(function($event) {
                        $event->event_type = 'organization';
                        return $event;
                    });

                $my_activities = $temple_events->merge($org_events)->sortByDesc('created_at')->take(5);
            } catch (\Exception $e) {
                // Ignore
            }

            return [
                'stats' => $stats,
                'my_temples' => $my_temples,
                'my_organizations' => $my_organizations,
                'my_jobs' => $my_jobs,
                'my_activities' => $my_activities,
            ];
        } catch (\Exception $e) {
            return [
                'stats' => ['profile_completion' => 0],
                'my_temples' => collect([]),
                'my_organizations' => collect([]),
                'my_jobs' => collect([]),
                'my_activities' => collect([]),
            ];
        }
    }

    private function calculateProfileCompletion($user)
    {
        $fields = ['name', 'email', 'contact_no', 'profile_pic', 'street_address_1', 'city', 'state', 'zipcode', 'country'];
        $completed = 0;
        foreach ($fields as $field) {
            if (!empty($user->$field)) $completed++;
        }
        return round(($completed / count($fields)) * 100);
    }
}
