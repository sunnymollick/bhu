<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Temple;
use App\Models\Organization;
use App\Models\User;
use App\Models\Banner;
use App\Models\About;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    /**
     * Display the home page with cached dynamic content.
     *
     * Implements industry-level caching strategy:
     * - Home page data cached for 1 hour (3600 seconds)
     * - Statistics cached for 5 minutes (300 seconds) for real-time updates
     * - Map data cached for 30 minutes (1800 seconds)
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        try {
            // Cache banners/sliders for 1 hour
            $banners = Cache::remember('home_banners', 3600, function () {
                return Banner::active()
                    ->ordered()
                    ->select('id', 'image_name', 'title', 'subtitle', 'button_text_1', 'button_link_1', 'button_text_2', 'button_link_2', 'sort_order')
                    ->get();
            });

            // Cache services for 1 hour
            $services = Cache::remember('home_services', 3600, function () {
                return Service::active()
                    ->ordered()
                    ->select('id', 'title', 'description', 'icon', 'order')
                    ->get();
            });

            // Cache statistics for 5 minutes for real-time accuracy
            $statistics = Cache::remember('home_statistics', 300, function () {
                return [
                    'users' => User::where('active', true)
                        ->where('is_approved', true)
                        ->count(),
                    'organizations' => Organization::where('status', 'approved')
                        ->count(),
                    'temples' => Temple::where('status', true)
                        ->where('approval_status', 'approved')
                        ->count(),
                ];
            });

            // Cache about content for 1 hour
            $about = Cache::remember('about_content', 3600, function () {
                return About::active()->latest()->first();
            });

            // Cache map locations for 30 minutes with query optimization
            $mapLocations = Cache::remember('home_map_locations', 1800, function () {
                return Temple::where('status', true)
                    ->where('approval_status', 'approved')
                    ->whereNotNull('latitude')
                    ->whereNotNull('longitude')
                    ->select('id', 'name', 'latitude', 'longitude', 'address')
                    ->limit(500) // Limit for performance
                    ->get()
                    ->map(function ($temple) {
                        return [
                            'lat' => (float) $temple->latitude,
                            'lng' => (float) $temple->longitude,
                            'name' => $temple->name,
                            'address' => $temple->address ?? '',
                        ];
                    });
            });

            return view('frontend.pages.home.index', compact(
                'banners',
                'services',
                'statistics',
                'mapLocations',
                'about'
            ));

        } catch (\Exception $e) {
            Log::error('Home page error: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);

            // Fallback to basic view if error occurs
            return view('frontend.pages.home.index', [
                'banners' => collect(),
                'services' => collect(),
                'statistics' => [
                    'users' => 0,
                    'organizations' => 0,
                    'temples' => 0,
                ],
                'mapLocations' => collect(),
                'about' => null,
            ]);
        }
    }

    /**
     * Display the about page.
     *
     * @return \Illuminate\View\View
     */
    public function about()
    {
        // Cache about content for 1 hour
        $about = Cache::remember('about_content', 3600, function () {
            return About::active()->latest()->first();
        });

        return view('frontend.pages.about.index', compact('about'));
    }

    /**
     * Display the teams page.
     *
     * @return \Illuminate\View\View
     */
    public function teams()
    {
        $teams = User::where('active', true)
            ->where('is_approved', true)
            ->where('in_website', true)
            ->select('id', 'name', 'profile_pic', 'role_id')
            ->with('role:id,name')
            ->get();

        return view('frontend.pages.teams.index', compact('teams'));
    }

    /**
     * Handle volunteer registration form submission.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function volunteerRegister(\Illuminate\Http\Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'phone'      => 'required|string|max:20',
            'email'      => 'required|email|max:255',
            'message'    => 'required|string',
        ]);

        // TODO: store volunteer registration or send notification email

        return redirect()->route('frontend.teams')->with('success', 'Thank you for registering as a volunteer!');
    }

    /**
     * Clear all home page caches.
     * Useful when content is updated from admin panel.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function clearCache()
    {
        try {
            Cache::forget('home_banners');
            Cache::forget('home_services');
            Cache::forget('home_statistics');
            Cache::forget('home_map_locations');

            return response()->json([
                'success' => true,
                'message' => 'Home page cache cleared successfully'
            ]);

        } catch (\Exception $e) {
            Log::error('Cache clear error: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Failed to clear cache'
            ], 500);
        }
    }
}
