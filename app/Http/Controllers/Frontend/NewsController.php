<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $query = News::where('status', 'approved')
            ->with('creator')
            ->orderBy('date_time', 'desc');

        // Search filter
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%")
                  ->orWhere('final_news', 'like', "%{$search}%");
            });
        }

        // Location filter
        if ($request->has('location') && $request->location) {
            // Decode URL-encoded location (for Bangla/Unicode characters)
            $location = urldecode($request->location);
            $query->where('location', $location);
        }

        $newsList = $query->paginate(12);

        // Recent news for sidebar
        $recentNews = News::where('status', 'approved')
            ->orderBy('date_time', 'desc')
            ->limit(5)
            ->get();

        // Popular locations (tags) - with proper normalization to avoid duplicates
        $popularLocations = News::where('status', 'approved')
            ->whereNotNull('location')
            ->where('location', '!=', '')
            ->selectRaw('TRIM(location) as location, COUNT(*) as total')
            ->groupBy(DB::raw('TRIM(location)'))
            ->having('total', '>', 0)
            ->orderBy('total', 'desc')
            ->limit(15)
            ->get();

        return view('frontend.pages.news.news', compact('newsList', 'recentNews', 'popularLocations'));
    }

    public function show($id)
    {
        $news = News::where('status', 'approved')
            ->with('creator')
            ->findOrFail($id);

        // Recent news for sidebar
        $recentNews = News::where('status', 'approved')
            ->where('id', '!=', $id)
            ->orderBy('date_time', 'desc')
            ->limit(5)
            ->get();

        // Popular locations (tags) - with proper normalization to avoid duplicates
        $popularLocations = News::where('status', 'approved')
            ->whereNotNull('location')
            ->where('location', '!=', '')
            ->selectRaw('TRIM(location) as location, COUNT(*) as total')
            ->groupBy(DB::raw('TRIM(location)'))
            ->having('total', '>', 0)
            ->orderBy('total', 'desc')
            ->limit(15)
            ->get();

        return view('frontend.pages.news.news-details', compact('news', 'recentNews', 'popularLocations'));
    }

    /**
     * Search news for autocomplete
     */
    public function searchNews(Request $request)
    {
        $query = $request->get('query', '');

        if (strlen($query) < 2) {
            return response()->json([]);
        }

        $news = News::where('status', 'approved')
            ->where(function($q) use ($query) {
                $q->where('title', 'like', "%{$query}%")
                  ->orWhere('location', 'like', "%{$query}%")
                  ->orWhere('final_news', 'like', "%{$query}%");
            })
            ->orderBy('date_time', 'desc')
            ->limit(8)
            ->get(['id', 'title', 'location', 'date_time']);

        $results = $news->map(function($item) {
            return [
                'id' => $item->id,
                'label' => $item->title,
                'location' => $item->location ?? 'Unknown Location',
                'date' => $item->date_time->format('M d, Y'),
                'value' => $item->title
            ];
        });

        return response()->json($results);
    }
}
