<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    /**
     * Display a listing of services.
     */
    public function index()
    {
        $services = Service::orderBy('order', 'asc')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('backend.pages.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new service.
     */
    public function create()
    {
        return view('backend.pages.services.create');
    }

    /**
     * Store a newly created service.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'title_bn' => 'nullable|string|max:255',
            'description' => 'required|string|max:1000',
            'description_bn' => 'nullable|string|max:1000',
            'icon' => 'nullable|string|max:100',
            'order' => 'required|integer|min:0',
            'status' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            Service::create([
                'title' => $request->title,
                'title_bn' => $request->title_bn,
                'description' => $request->description,
                'description_bn' => $request->description_bn,
                'icon' => $request->icon,
                'order' => $request->order,
                'status' => $request->status,
                'created_by' => Auth::id(),
                'updated_by' => Auth::id(),
            ]);

            // Clear home page cache
            Cache::forget('home_services');

            return redirect()->route('admin.services.index')
                ->with('success', 'Service created successfully');

        } catch (\Exception $e) {
            Log::error('Service creation error: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Failed to create service')
                ->withInput();
        }
    }

    /**
     * Show the form for editing a service.
     */
    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('backend.pages.services.edit', compact('service'));
    }

    /**
     * Update the specified service.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'title_bn' => 'nullable|string|max:255',
            'description' => 'required|string|max:1000',
            'description_bn' => 'nullable|string|max:1000',
            'icon' => 'nullable|string|max:100',
            'order' => 'required|integer|min:0',
            'status' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $service = Service::findOrFail($id);
            $service->update([
                'title' => $request->title,
                'title_bn' => $request->title_bn,
                'description' => $request->description,
                'description_bn' => $request->description_bn,
                'icon' => $request->icon,
                'order' => $request->order,
                'status' => $request->status,
                'updated_by' => Auth::id(),
            ]);

            // Clear home page cache
            Cache::forget('home_services');

            return redirect()->route('admin.services.index')
                ->with('success', 'Service updated successfully');

        } catch (\Exception $e) {
            Log::error('Service update error: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Failed to update service')
                ->withInput();
        }
    }

    /**
     * Remove the specified service.
     */
    public function destroy($id)
    {
        try {
            $service = Service::findOrFail($id);
            $service->delete();

            // Clear home page cache
            Cache::forget('home_services');

            return redirect()->route('admin.services.index')
                ->with('success', 'Service deleted successfully');

        } catch (\Exception $e) {
            Log::error('Service deletion error: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Failed to delete service');
        }
    }

    /**
     * Toggle service status.
     */
    public function toggleStatus($id)
    {
        try {
            $service = Service::findOrFail($id);
            $service->status = !$service->status;
            $service->updated_by = Auth::id();
            $service->save();

            // Clear home page cache
            Cache::forget('home_services');

            return response()->json([
                'success' => true,
                'message' => 'Status updated successfully',
                'status' => $service->status
            ]);

        } catch (\Exception $e) {
            Log::error('Service status toggle error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to update status'
            ], 500);
        }
    }
}
