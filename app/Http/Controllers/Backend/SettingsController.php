<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class SettingsController extends Controller
{
    public function edit()
    {
        $setting = Setting::firstOrCreate(['id' => 1]);
        return view('backend.pages.settings.edit', compact('setting'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'primary_email'    => 'nullable|email|max:255',
            'secondary_email'  => 'nullable|email|max:255',
            'primary_phone'    => 'nullable|string|max:50',
            'secondary_phone'  => 'nullable|string|max:50',
            'address'          => 'nullable|string|max:500',
            'facebook_url'     => 'nullable|url|max:255',
            'linkedin_url'     => 'nullable|url|max:255',
            'x_url'            => 'nullable|url|max:255',
            'youtube_url'      => 'nullable|url|max:255',
            'map_embed'        => 'nullable|string|max:2000',
        ]);

        $setting = Setting::firstOrCreate(['id' => 1]);
        $setting->update([
            'primary_email'    => $request->primary_email,
            'secondary_email'  => $request->secondary_email,
            'primary_phone'    => $request->primary_phone,
            'secondary_phone'  => $request->secondary_phone,
            'address'          => $request->address,
            'facebook_url'     => $request->facebook_url,
            'linkedin_url'     => $request->linkedin_url,
            'x_url'            => $request->x_url,
            'youtube_url'      => $request->youtube_url,
            'map_embed'        => $request->map_embed,
            'updated_by'       => Auth::id(),
        ]);

        Cache::forget('site_settings');

        return redirect()->route('admin.settings.edit')->with('success', 'Settings updated successfully.');
    }
}
