<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Organization;
use App\Models\Division;
use App\Models\District;
use App\Models\BusinessCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class OrganizationController extends Controller
{
    public function all(Request $request){
        $user = Auth::user();

        // Check if user is Admin or Super Admin (role_id 1 or 2)
        if ($user->role_id == 1 || $user->role_id == 2) {
            // Admin and Super Admin can see all organizations
            $query = Organization::with(['division', 'district'])->orderBy('id', 'desc');

            // Apply filters based on query parameters
            if ($request->has('filter')) {
                $filter = $request->get('filter');

                if ($filter === 'pending_approval') {
                    $query->where('status', 'pending');
                }
            }

            $organizations = $query->get();
        } else {
            // Normal users can only see organizations created by them
            $organizations = Organization::with(['division', 'district'])
                ->where('created_by', $user->id)
                ->orderBy('id', 'desc')
                ->get();
        }

        return view('backend.pages.organization.all', compact('organizations'));
    }

    public function create(){
        $divisions = Division::all();
        $districts = District::all();
        $businessCategories = BusinessCategory::with('businesses')
            ->where('category_type', 'business')
            ->get();
        $religiousCategories = BusinessCategory::with('businesses')
            ->where('category_type', 'religious')
            ->get();
        return view('backend.pages.organization.create', compact('divisions', 'districts', 'businessCategories', 'religiousCategories'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'division_id' => 'nullable|exists:divisions,id',
            'district_id' => 'nullable|exists:districts,id',
            'website' => 'nullable|string|max:255',
            'registration_no' => 'nullable|string|max:100',
            'contact_person_name' => 'nullable|string|max:255',
            'contact_person_role' => 'nullable|string|max:100',
            'established_date' => 'nullable|date',
            'organization_type' => 'required|string|in:business,religious,both',
            'description' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'business_ids' => 'nullable|array',
            'business_ids.*' => 'exists:businesses,id'
        ]);

        $org = new Organization();
        $org->name = $request->name;
        $org->email = $request->email;
        $org->phone = $request->phone;
        $org->address = $request->address;
        $org->latitude = $request->latitude;
        $org->longitude = $request->longitude;
        $org->division_id = $request->division_id;
        $org->district_id = $request->district_id;
        $org->website = $request->website;
        $org->registration_no = $request->registration_no;
        $org->contact_person_name = $request->contact_person_name;
        $org->contact_person_role = $request->contact_person_role;
        $org->established_date = $request->established_date;
        $org->organization_type = $request->organization_type;
        $org->description = $request->description;

        $user = Auth::user();
        // Auto-approve if created by Admin or Super Admin
        if ($user->role_id == 1 || $user->role_id == 2) {
            $org->status = 'approved';
            $org->approved_by = $user->id;
            $org->approved_at = now();
        } else {
            $org->status = 'pending';
        }

        $org->created_by = Auth::id();

        // Handle logo upload
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = Str::uuid() . '.' . $logo->getClientOriginalExtension();
            $logo->move(public_path('backend/uploads/organization/logo'), $logoName);
            $org->logo_url = 'backend/uploads/organization/logo/' . $logoName;
        }

        $org->save();

        // Sync business/religious activities
        if ($request->business_ids) {
            foreach ($request->business_ids as $businessId) {
                \App\Models\OrganizationBusiness::create([
                    'organization_id' => $org->id,
                    'business_id' => $businessId
                ]);
            }
        }

        return redirect()->route('admin.organization.all')->with('success', 'Organization created successfully.');
    }

    public function approve($id){
        $user = Auth::user();

        // Only Admin and Super Admin can approve (role_id 1 or 2)
        if ($user->role_id != 1 && $user->role_id != 2) {
            return redirect()->route('admin.organization.all')->with('error', 'You do not have permission to approve organizations.');
        }

        $org = Organization::findOrFail($id);
        $org->status = 'approved';
        $org->approved_by = Auth::id();
        $org->approved_at = now();
        $org->save();

        return redirect()->route('admin.organization.all')->with('success', 'Organization approved successfully.');
    }

    public function edit($id){
        $organization = Organization::with(['businesses'])->findOrFail($id);
        $divisions = Division::all();
        $districts = District::all();
        $businessCategories = BusinessCategory::with('businesses')
            ->where('category_type', 'business')
            ->get();
        $religiousCategories = BusinessCategory::with('businesses')
            ->where('category_type', 'religious')
            ->get();
        return view('backend.pages.organization.edit', compact('organization', 'divisions', 'districts', 'businessCategories', 'religiousCategories'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'division_id' => 'nullable|exists:divisions,id',
            'district_id' => 'nullable|exists:districts,id',
            'website' => 'nullable|string|max:255',
            'registration_no' => 'nullable|string|max:100',
            'contact_person_name' => 'nullable|string|max:255',
            'contact_person_role' => 'nullable|string|max:100',
            'established_date' => 'nullable|date',
            'organization_type' => 'required|string|in:business,religious,both',
            'description' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'businesses' => 'nullable|array',
            'businesses.*' => 'exists:businesses,id'
        ]);

        $org = Organization::findOrFail($id);
        $org->name = $request->name;
        $org->email = $request->email;
        $org->phone = $request->phone;
        $org->address = $request->address;
        $org->latitude = $request->latitude;
        $org->longitude = $request->longitude;
        $org->division_id = $request->division_id;
        $org->district_id = $request->district_id;
        $org->website = $request->website;
        $org->registration_no = $request->registration_no;
        $org->contact_person_name = $request->contact_person_name;
        $org->contact_person_role = $request->contact_person_role;
        $org->established_date = $request->established_date;
        $org->organization_type = $request->organization_type;
        $org->description = $request->description;
        $org->updated_by = Auth::id();

        // Handle logo upload (replace old if new uploaded)
        if ($request->hasFile('logo')) {
            // Delete old logo if exists
            if ($org->logo_url && file_exists(public_path($org->logo_url))) {
                @unlink(public_path($org->logo_url));
            }
            $logo = $request->file('logo');
            $logoName = Str::uuid() . '.' . $logo->getClientOriginalExtension();
            $logo->move(public_path('backend/uploads/organization/logo'), $logoName);
            $org->logo_url = 'backend/uploads/organization/logo/' . $logoName;
        }

        $org->save();

        // Sync business/religious activities
        // Delete all existing relationships
        \App\Models\OrganizationBusiness::where('organization_id', $org->id)->delete();

        // Add new relationships if provided
        if ($request->businesses) {
            foreach ($request->businesses as $businessId) {
                \App\Models\OrganizationBusiness::create([
                    'organization_id' => $org->id,
                    'business_id' => $businessId
                ]);
            }
        }

        return redirect()->route('admin.organization.all')->with('success', 'Organization updated successfully.');
    }

    public function destroy($id){
        $org = Organization::findOrFail($id);

        // Delete logo file if exists
        if ($org->logo_url && file_exists(public_path($org->logo_url))) {
            @unlink(public_path($org->logo_url));
        }

        $org->delete();

        return redirect()->route('admin.organization.all')->with('success', 'Organization deleted successfully.');
    }
}
