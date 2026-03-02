<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Temple;
use App\Models\Organization;
use App\Models\JobPost;
use App\Models\News;
use App\Models\Contact;
use App\Models\About;
use Illuminate\Support\Facades\Cache;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Share about content with the frontend footer globally
        View::composer('frontend.includes.footer', function ($view) {
            $footerAbout = Cache::remember('about_content', 3600, function () {
                return About::active()->latest()->first();
            });
            $view->with('footerAbout', $footerAbout);
        });

        // Share pending notifications with backend navbar
        View::composer('backend.includes.nav', function ($view) {
            // Initialize empty collections for non-admin users
            $pendingTemples = collect();
            $pendingOrganizations = collect();
            $pendingJobs = collect();
            $pendingNews = collect();
            $recentContacts = collect();
            $totalPending = 0;
            $unreadContactsCount = 0;

            // Only load pending items for Admin and Super Admin
            if (Auth::check() && in_array(Auth::user()->role?->name, ['Admin', 'Super Admin'])) {
                // Get pending temples (where approved_by is null)
                $pendingTemples = Temple::whereNull('approved_by')->orderBy('created_at', 'desc')->get();

                // Get pending organizations (where approved_by is null)
                $pendingOrganizations = Organization::whereNull('approved_by')->orderBy('created_at', 'desc')->get();

                // Get pending job posts (where is_approved is false)
                $pendingJobs = JobPost::where('is_approved', false)->orderBy('created_at', 'desc')->get();

                // Get pending news (where approved_by is null)
                $pendingNews = News::whereNull('approved_by')->orderBy('created_at', 'desc')->get();

                // Get recent contact messages (status = 'unread' or 'pending', latest 5)
                $recentContacts = Contact::whereIn('status', ['unread', 'pending'])
                    ->orWhereNull('status')
                    ->orderBy('created_at', 'desc')
                    ->limit(5)
                    ->get();

                $unreadContactsCount = Contact::whereIn('status', ['unread', 'pending'])
                    ->orWhereNull('status')
                    ->count();

                // Calculate total pending
                $totalPending = $pendingTemples->count() + $pendingOrganizations->count() +
                               $pendingJobs->count() + $pendingNews->count();
            }

            $view->with([
                'pendingTemples' => $pendingTemples,
                'pendingOrganizations' => $pendingOrganizations,
                'pendingJobs' => $pendingJobs,
                'pendingNews' => $pendingNews,
                'totalPending' => $totalPending,
                'recentContacts' => $recentContacts,
                'unreadContactsCount' => $unreadContactsCount
            ]);
        });
    }
}
