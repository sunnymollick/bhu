<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

use App\Models\Role;
use App\Models\User;
use App\Models\Division;
use App\Models\District;
use App\Models\Upazila;
use App\Mail\UserApprovedEmail;
use App\Mail\VerificationReminderEmail;

class UserController extends Controller
{
    public function all(Request $request){
        $query = User::with(['role', 'creator'])->orderBy('id', 'desc');

        // Show only email-verified users (except admin/superadmin)
        $query->where(function($q) {
            $q->whereIn('role_id', [1, 2]) // Admin or Super Admin
              ->orWhereNotNull('email_verified_at'); // Or email verified users
        });

        // Apply filters based on query parameters
        if ($request->has('filter')) {
            $filter = $request->get('filter');

            if ($filter === 'verified') {
                $query->where('is_verified', 1);
            } elseif ($filter === 'pending') {
                // Only show pending users (is_verified is NULL), not rejected (is_verified = 0)
                $query->whereNull('is_verified');
            } elseif ($filter === 'pending_approval') {
                $query->where(function($q) {
                    $q->where('is_approved', 0)->orWhereNull('is_approved');
                });
            }
        }

        $users = $query->get();
        return view('backend.pages.user.all', compact('users'));
    }

    public function create(){
        $roles = Role::all();
        return view('backend.pages.user.create', compact('roles'));
    }

    public function store(Request $request){
        $obj = new User();
        $obj->name = $request->name;
        $obj->email = $request->email;
        $obj->password = $request->password;
        // $obj->confirm_password = $request->confirm_password;
        $obj->contact_no = $request->contact_no;
        $obj->address = $request->address;
        $obj->in_website = $request->has('in_website');
        $obj->role_id = $request->role_id;
        $obj->created_by = Auth::user()->id;

        if ($request->hasFile('image')) {
            $image = $request->file('image'); // just get the single uploaded file

            $uniqueName = Str::uuid() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('backend/uploads/user'), $uniqueName);

            $obj->profile_pic = $uniqueName;

        }

        if($obj->save()){
            return redirect()->route('admin.user.all');
        }
    }

    public function verify($id){
        $user = User::findOrFail($id);

        if($user->is_verified === 1){
            return redirect()->route('admin.user.all')->with('error', 'User is already verified.');
        }

        $user->is_verified = 1;
        $user->save();

        return redirect()->route('admin.dashboard')->with('success', 'User verified successfully.');
    }

    public function approve($id){
        $user = User::findOrFail($id);

        if($user->is_approved){
            return redirect()->route('admin.user.all')->with('error', 'User is already approved.');
        }

        $user->is_approved = true;
        $user->approved_by = Auth::id();
        $user->save();

        // Send approval email notification
        try {
            Mail::to($user->email)->send(new UserApprovedEmail($user));
        } catch (\Exception $e) {
            Log::error('Failed to send approval email: ' . $e->getMessage());
        }

        return redirect()->route('admin.user.all')->with('success', 'User approved successfully and notification email sent.');
    }

    public function toggleActive($id){
        $user = User::findOrFail($id);

        $user->active = !$user->active;
        $user->save();

        $status = $user->active ? 'active' : 'inactive';
        return redirect()->route('admin.user.all')->with('success', "User status changed to {$status} successfully.");
    }

    public function destroy($id){
        $user = User::findOrFail($id);

        // Delete profile picture if exists
        if($user->profile_pic && File::exists(public_path('backend/uploads/user/' . $user->profile_pic))){
            File::delete(public_path('backend/uploads/user/' . $user->profile_pic));
        }

        // Delete passport if exists
        if($user->passport && File::exists(public_path('backend/uploads/users/documents/' . $user->passport))){
            File::delete(public_path('backend/uploads/users/documents/' . $user->passport));
        }

        // Delete NID if exists
        if($user->nid && File::exists(public_path('backend/uploads/users/documents/' . $user->nid))){
            File::delete(public_path('backend/uploads/users/documents/' . $user->nid));
        }

        $user->delete();

        return redirect()->route('admin.user.all')->with('success', 'User deleted successfully.');
    }

    /**
     * Show profile page for current authenticated user
     */
    public function profile()
    {
        $user = User::with('division', 'district', 'upazila')->find(Auth::id());
        return view('backend.pages.profile.profile', compact('user'));
    }

    /**
     * Show edit profile page
     */
    public function editProfile()
    {
        $user = Auth::user();
        $divisions = Division::all();
        $districts = collect([]);
        $upazilas = collect([]);

        // Load districts if user has a division
        if ($user->division_id) {
            $districts = District::where('division_id', $user->division_id)->get();
        }

        // Load upazilas if user has a district
        if ($user->district_id) {
            $upazilas = Upazila::where('district_id', $user->district_id)->get();
        }

        return view('backend.pages.profile.edit', compact('user', 'divisions', 'districts', 'upazilas'));
    }

    /**
     * Update profile information
     */
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
            'contact_no' => 'nullable|string|max:20',
            'country' => 'nullable|string|max:100',
            'division_id' => 'nullable|exists:divisions,id',
            'district_id' => 'nullable|exists:districts,id',
            'upazila_id' => 'nullable|exists:upazilas,id',
            'street_address_1' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:100',
            'state' => 'nullable|string|max:100',
            'zipcode' => 'nullable|string|max:20',
            'nid' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'passport' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $user = User::find(Auth::id());
        $user->name = $request->name;
        $user->email = $request->email;
        $user->contact_no = $request->contact_no;
        $user->country = $request->country;
        $user->division_id = $request->division_id;
        $user->district_id = $request->district_id;
        $user->upazila_id = $request->upazila_id;
        $user->street_address_1 = $request->street_address_1;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->zipcode = $request->zipcode;

        // Handle profile picture upload
        if ($request->hasFile('profile_pic')) {
            // Delete old profile picture if exists
            if($user->profile_pic && File::exists(public_path('backend/uploads/user/' . $user->profile_pic))){
                File::delete(public_path('backend/uploads/user/' . $user->profile_pic));
            }

            $image = $request->file('profile_pic');
            $uniqueName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('backend/uploads/user'), $uniqueName);
            $user->profile_pic = $uniqueName;
        }

        // Handle NID document upload
        if ($request->hasFile('nid')) {
            // Delete old NID if exists
            if($user->nid && File::exists(public_path('backend/uploads/users/documents/' . $user->nid))){
                File::delete(public_path('backend/uploads/users/documents/' . $user->nid));
            }

            $nidFile = $request->file('nid');
            $nidName = 'nid_' . Str::uuid() . '.' . $nidFile->getClientOriginalExtension();

            // Create directory if it doesn't exist
            if (!File::exists(public_path('backend/uploads/users/documents'))) {
                File::makeDirectory(public_path('backend/uploads/users/documents'), 0755, true);
            }

            $nidFile->move(public_path('backend/uploads/users/documents'), $nidName);
            $user->nid = $nidName;
        }

        // Handle Passport document upload
        if ($request->hasFile('passport')) {
            // Delete old passport if exists
            if($user->passport && File::exists(public_path('backend/uploads/users/documents/' . $user->passport))){
                File::delete(public_path('backend/uploads/users/documents/' . $user->passport));
            }

            $passportFile = $request->file('passport');
            $passportName = 'passport_' . Str::uuid() . '.' . $passportFile->getClientOriginalExtension();

            // Create directory if it doesn't exist
            if (!File::exists(public_path('backend/uploads/users/documents'))) {
                File::makeDirectory(public_path('backend/uploads/users/documents'), 0755, true);
            }

            $passportFile->move(public_path('backend/uploads/users/documents'), $passportName);
            $user->passport = $passportName;
        }

        $user->save();

        return redirect()->route('admin.user.profile')->with('success', 'Profile updated successfully!');
    }

    /**
     * Show change password page
     */
    public function changePassword()
    {
        return view('backend.pages.profile.change_password');
    }

    /**
     * Update password
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => [
                'required',
                'min:8',
                'confirmed',
                'regex:/[a-z]/',      // Must contain at least one lowercase letter
                'regex:/[A-Z]/',      // Must contain at least one uppercase letter
                'regex:/[0-9]/',      // Must contain at least one number
                'regex:/[@$!%*#?&]/', // Must contain at least one special character
            ],
        ], [
            'new_password.min' => 'Password must be at least 8 characters long.',
            'new_password.confirmed' => 'Password confirmation does not match.',
            'new_password.regex' => 'Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character (@$!%*#?&).'
        ]);

        $user = User::find(Auth::id());

        // Check if current password matches
        if (!password_verify($request->current_password, $user->password)) {
            return back()->with('error', 'Current password is incorrect!');
        }

        // Update password
        $user->password = bcrypt($request->new_password);
        $user->save();

        return redirect()->route('admin.user.profile')->with('success', 'Password changed successfully!');
    }

    /**
     * Toggle student status
     */
    public function toggleStudentStatus(Request $request)
    {
        $request->validate([
            'is_student' => 'required|boolean'
        ]);

        $user = User::find(Auth::id());
        $user->is_student = $request->is_student;
        $user->save();

        $message = $request->is_student
            ? 'You are now marked as a student. You can now access My Career section.'
            : 'Student status removed successfully.';

        return response()->json([
            'success' => true,
            'message' => $message,
            'is_student' => $user->is_student
        ]);
    }

    /**
     * Show my career page (students only)
     */
    public function myCareer()
    {
        $user = Auth::user();

        if (!$user->is_student) {
            return redirect()->route('admin.user.profile')->with('error', 'This section is only available for students.');
        }

        // Get or create career profile
        $career = \App\Models\MyCareer::getOrCreateForUser($user->id);

        return view('backend.pages.career.index', compact('user', 'career'));
    }

    /**
     * Show form to send verification reminder email
     */
    public function showVerificationReminderForm($id)
    {
        $user = User::findOrFail($id);

        // Check if user is pending verification
        if ($user->is_verified !== null) {
            return redirect()->route('admin.user.all')->with('error', 'This user is already verified or rejected.');
        }

        // Get reference person if exists
        $referencePerson = null;
        if ($user->reference_by) {
            $referencePerson = User::where('email', $user->reference_by)->first();
        }

        return view('backend.pages.user.send-verification-reminder', compact('user', 'referencePerson'));
    }

    /**
     * Send verification reminder email to user
     */
    public function sendVerificationReminder(Request $request, $id)
    {
        $request->validate([
            'message' => 'required|string|min:10',
        ]);

        $user = User::findOrFail($id);

        // Check if user is pending verification
        if ($user->is_verified !== null) {
            return redirect()->route('admin.user.all')->with('error', 'This user is already verified or rejected.');
        }

        try {
            $adminName = Auth::user()->name;
            $message = $request->message;

            // Send the email
            Mail::to($user->email)->send(new VerificationReminderEmail($user, $message, $adminName));

            return redirect()->route('admin.user.all')->with('success', 'Verification reminder email sent successfully to ' . $user->name . '. Any further conversation will continue via webmail.');
        } catch (\Exception $e) {
            Log::error('Failed to send verification reminder email: ' . $e->getMessage());
            return back()->with('error', 'Failed to send email. Please try again later.');
        }
    }
}
