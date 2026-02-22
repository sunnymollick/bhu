<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Division;
use App\Models\District;
use App\Models\Upazila;
use App\Mail\WelcomeEmail;
use App\Mail\ReferenceNotificationEmail;

class AuthController extends Controller
{
    public function login(){
        return view('frontend.pages.auth.login');
    }

    public function adminLogin(){
        return view('backend.pages.auth.login');
    }

    public function loginStore(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // Check if email is verified (only for non-admin users)
            if (!in_array($user->role_id, [1, 2]) && !$user->email_verified_at) {
                // Store user email in session for display
                session(['unverified_user_email' => $user->email]);

                if ($request->ajax() || $request->wantsJson()) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Please verify your email address before logging in. Check your inbox for the verification link.',
                        'requires_verification' => true
                    ], 403);
                }
                return redirect()->route('verification.notice')->with('warning', 'Please verify your email address before logging in.');
            }

            // Check if user is approved
            if (!$user->is_approved) {
                if ($request->ajax() || $request->wantsJson()) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Your account is pending admin approval. Please wait for verification.'
                    ], 403);
                }
                return back()->withErrors([
                    'email' => 'Your account is pending admin approval. Please wait for verification.',
                ])->withInput($request->only('email'));
            }

            // Check if user is active
            if (!$user->active) {
                if ($request->ajax() || $request->wantsJson()) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Your account has been deactivated. Please contact support.'
                    ], 403);
                }
                return back()->withErrors([
                    'email' => 'Your account has been deactivated. Please contact support.',
                ])->withInput($request->only('email'));
            }

            Auth::login($user, $request->has('remember'));

            // If AJAX request (from frontend), return JSON response
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Login successful!',
                    'redirect_url' => route('admin.dashboard'),
                    'user' => [
                        'name' => $user->fname . ' ' . $user->lname,
                        'email' => $user->email
                    ]
                ]);
            }

            return redirect()->route('admin.dashboard')->with('success', 'Welcome back, ' . $user->fname . '! You have successfully logged in.');
        } else {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid credentials.'
                ], 401);
            }
            return back()->withErrors([
                'email' => 'Invalid credentials.',
            ])->withInput($request->only('email'));
        }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'You have been logged out successfully.');
    }

    public function register(){
        // Clear temp file sessions when user visits register page normally
        // (not from a validation error redirect)
        if (!session()->has('errors')) {
            // Clean up temp files
            if (session('temp_passport') && File::exists(public_path('backend/uploads/temp/' . session('temp_passport')))) {
                File::delete(public_path('backend/uploads/temp/' . session('temp_passport')));
            }
            if (session('temp_nid') && File::exists(public_path('backend/uploads/temp/' . session('temp_nid')))) {
                File::delete(public_path('backend/uploads/temp/' . session('temp_nid')));
            }

            // Clear session data
            session()->forget(['temp_passport', 'temp_passport_original', 'temp_nid', 'temp_nid_original']);
        }

        // Fetch all divisions for the dropdown
        $divisions = Division::orderBy('name', 'asc')->get();

        return view('frontend.pages.auth.registration', compact('divisions'));
    }

    public function registerStore(Request $request){
        // Handle file uploads before validation to preserve them on validation errors
        $tempPassportPath = null;
        $tempNidPath = null;

        if ($request->hasFile('passport')) {
            $passport = $request->file('passport');
            $tempPassportName = 'temp_' . Str::uuid() . '.' . $passport->getClientOriginalExtension();
            $passport->move(public_path('backend/uploads/temp'), $tempPassportName);
            $tempPassportPath = $tempPassportName;
            session(['temp_passport' => $tempPassportName]);
            session(['temp_passport_original' => $passport->getClientOriginalName()]);
        }

        if ($request->hasFile('nid')) {
            $nid = $request->file('nid');
            $tempNidName = 'temp_' . Str::uuid() . '.' . $nid->getClientOriginalExtension();
            $nid->move(public_path('backend/uploads/temp'), $tempNidName);
            $tempNidPath = $tempNidName;
            session(['temp_nid' => $tempNidName]);
            session(['temp_nid_original' => $nid->getClientOriginalName()]);
        }

        // Build validation rules - skip file validation if temp files exist
        $validationRules = [
            'fname' => 'required|string|min:2|max:255',
            'lname' => 'required|string|min:2|max:255',
            'email' => ['required', 'email:rfc,dns', 'unique:users,email', 'max:255'],
            'confirm_email' => ['required', 'email:rfc,dns', 'same:email'],
            'contact_no' => ['required', 'string', 'max:20', 'regex:/^[\d\s\+\-\(\)]+$/'],
            'confirm_contact_no' => ['required', 'string', 'same:contact_no'],
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
                'regex:/[a-z]/',      // Must contain at least one lowercase letter
                'regex:/[A-Z]/',      // Must contain at least one uppercase letter
                'regex:/[0-9]/',      // Must contain at least one number
                'regex:/[@$!%*#?&]/', // Must contain at least one special character
            ],
            'password_confirmation' => 'required|string|min:8',
            'company_name' => 'nullable|string|max:255',
            'country' => 'required|string',
            'addr_1' => 'required|string|max:255',
            'addr_2' => 'nullable|string|max:255',
            'town' => 'required|string|max:255',
            'state' => 'nullable|string|max:255',
            'zipcode' => 'required|numeric',
            'division' => 'nullable|required_if:country,Bangladesh|exists:divisions,id',
            'district' => 'nullable|required_if:country,Bangladesh|exists:districts,id',
            'upazila' => 'nullable|required_if:country,Bangladesh|exists:upazilas,id',
            'reference_by' => ['nullable', 'email:rfc,dns', 'max:255', 'exists:users,email'],
        ];

        // Only validate files if they're being newly uploaded (not from temp)
        if (!session('temp_passport')) {
            $validationRules['passport'] = 'nullable|image|mimes:jpeg,png,jpg|max:2048';
        }
        if (!session('temp_nid')) {
            $validationRules['nid'] = 'nullable|image|mimes:jpeg,png,jpg|max:2048';
        }

        // Validate the request
        $validated = $request->validate($validationRules, [
            'contact_no.regex' => 'Phone number must contain only numbers, spaces, +, -, ( and )',
            'email.email' => 'Please enter a valid email address with proper domain.',
            'confirm_email.email' => 'Please enter a valid email address with proper domain.',
            'reference_by.email' => 'Reference email must be a valid email address with proper domain.',
            'reference_by.exists' => 'Reference email is not found in our system.',
            'password.min' => 'Password must be at least 8 characters long.',
            'password.confirmed' => 'Password confirmation does not match.',
            'password.regex' => 'Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character (@$!%*#?&).',
        ]);

        $uploadedFiles = [];

        try {
            DB::beginTransaction();

            // Handle passport image - use temp file or newly uploaded
            $passportName = null;
            if (session('temp_passport') && File::exists(public_path('backend/uploads/temp/' . session('temp_passport')))) {
                $passportName = Str::uuid() . '.' . pathinfo(session('temp_passport'), PATHINFO_EXTENSION);
                File::move(
                    public_path('backend/uploads/temp/' . session('temp_passport')),
                    public_path('backend/uploads/users/documents/' . $passportName)
                );
                $uploadedFiles[] = public_path('backend/uploads/users/documents/' . $passportName);
                session()->forget(['temp_passport', 'temp_passport_original']);
            }

            // Handle NID image - use temp file or newly uploaded
            $nidName = null;
            if (session('temp_nid') && File::exists(public_path('backend/uploads/temp/' . session('temp_nid')))) {
                $nidName = Str::uuid() . '.' . pathinfo(session('temp_nid'), PATHINFO_EXTENSION);
                File::move(
                    public_path('backend/uploads/temp/' . session('temp_nid')),
                    public_path('backend/uploads/users/documents/' . $nidName)
                );
                $uploadedFiles[] = public_path('backend/uploads/users/documents/' . $nidName);
                session()->forget(['temp_nid', 'temp_nid_original']);
            }

            // Create new user
            $user = User::create([
                'name' => $validated['fname'] . ' ' . $validated['lname'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'contact_no' => $validated['contact_no'],
                'company_name' => $validated['company_name'] ?? null,
                'reference_by' => $validated['reference_by'] ?? null,
                'country' => $validated['country'],
                'street_address_1' => $validated['addr_1'],
                'street_address_2' => $validated['addr_2'] ?? null,
                'city' => $validated['town'],
                'state' => $validated['state'] ?? null,
                'zipcode' => $validated['zipcode'],
                'division_id' => ($validated['country'] === 'Bangladesh') ? ($validated['division'] ?? null) : null,
                'district_id' => ($validated['country'] === 'Bangladesh') ? ($validated['district'] ?? null) : null,
                'upazila_id' => ($validated['country'] === 'Bangladesh') ? ($validated['upazila'] ?? null) : null,
                'passport' => $passportName,
                'nid' => $nidName,
                'role_id' => 5, // Normal User role - limited permissions for public registration
                'active' => true,
                'in_website' => false,
                'is_approved' => false, // Requires admin approval before login
            ]);

            DB::commit();

            // Generate verification token
            $verificationToken = hash_hmac('sha256', $user->email . time(), config('app.key'));
            $verificationUrl = route('verify.email', ['token' => $verificationToken, 'email' => base64_encode($user->email)]);

            // Store token in session temporarily (you may want to store in database for production)
            session(['email_verification_' . $user->id => $verificationToken]);

            // Send welcome email with verification link to the new user
            try {
                Mail::to($user->email)->queue(new WelcomeEmail($user, $verificationUrl));
            } catch (\Exception $mailException) {
                Log::warning('Failed to send welcome email', [
                    'user_email' => $user->email,
                    'error' => $mailException->getMessage()
                ]);
            }

            // Send notification email to the reference person if provided
            if (!empty($validated['reference_by'])) {
                try {
                    $referrer = User::where('email', $validated['reference_by'])->first();
                    if ($referrer) {
                        // Generate verification tokens for reference check
                        $verifyToken = hash_hmac('sha256', $user->id . 'verify' . time(), config('app.key'));
                        $rejectToken = hash_hmac('sha256', $user->id . 'reject' . time(), config('app.key'));

                        // Store tokens in user record
                        $user->reference_verify_token = $verifyToken;
                        $user->reference_reject_token = $rejectToken;
                        $user->save();

                        // Generate URLs
                        $verifyUrl = route('reference.verify', ['token' => $verifyToken, 'user' => $user->id]);
                        $rejectUrl = route('reference.reject', ['token' => $rejectToken, 'user' => $user->id]);

                        Mail::to($referrer->email)->queue(new ReferenceNotificationEmail($referrer, $user, $verifyUrl, $rejectUrl));
                    }
                } catch (\Exception $mailException) {
                    Log::warning('Failed to send reference notification email', [
                        'reference_email' => $validated['reference_by'],
                        'error' => $mailException->getMessage()
                    ]);
                }
            }

            return redirect()->route('login')->with('success', 'Registration successful! You have received an email, please verify your email address.');
        } catch (\Exception $e) {
            DB::rollBack();

            // Clean up uploaded files if DB transaction failed
            foreach ($uploadedFiles as $filePath) {
                if (File::exists($filePath)) {
                    File::delete($filePath);
                }
            }

            // Log the error for debugging
            Log::error('User registration failed', [
                'email' => $validated['email'] ?? 'N/A',
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return back()->withErrors(['error' => 'Registration failed. Please try again later.'])->withInput();
        }
    }

    public function verifyEmail(Request $request)
    {
        $token = $request->query('token');
        $email = base64_decode($request->query('email'));

        if (!$token || !$email) {
            return redirect()->route('register')->with('error', 'Invalid verification link.');
        }

        $user = User::where('email', $email)->first();

        if (!$user) {
            return redirect()->route('register')->with('error', 'User not found.');
        }

        // Verify token
        $storedToken = session('email_verification_' . $user->id);

        if (!$storedToken || $storedToken !== $token) {
            return redirect()->route('register')->with('error', 'Invalid or expired verification link.');
        }

        // Check if already verified
        if ($user->email_verified_at) {
            return redirect()->route('login')->with('success', 'Your email is already verified. Please wait for admin approval.');
        }

        // Update email verification
        $user->email_verified_at = now();
        $user->save();

        // Clear verification token from session
        session()->forget('email_verification_' . $user->id);

        return redirect()->route('login')->with('success', 'Your email is verified, please wait for admin approval.');
    }

    public function verifyReference(Request $request)
    {
        $token = $request->query('token');
        $userId = $request->query('user');

        if (!$token || !$userId) {
            return response()->view('emails.verification-response', [
                'success' => false,
                'message' => 'Invalid verification link.'
            ]);
        }

        $user = User::find($userId);

        if (!$user) {
            return response()->view('emails.verification-response', [
                'success' => false,
                'message' => 'User not found.'
            ]);
        }

        // Verify token
        if (!$user->reference_verify_token || $user->reference_verify_token !== $token) {
            return response()->view('emails.verification-response', [
                'success' => false,
                'message' => 'Invalid or expired verification link.'
            ]);
        }

        // Check if already processed (null = not processed, 1 = verified, 0 = rejected)
        if ($user->is_verified !== null) {
            $message = $user->is_verified == 1 ? 'This user has already been verified.' : 'This user has already been marked as unknown.';
            return response()->view('emails.verification-response', [
                'success' => true,
                'message' => $message,
                'alreadyProcessed' => true
            ]);
        }

        // Update verification status to 1 (verified)
        $user->is_verified = 1;
        $user->reference_verify_token = null;
        $user->reference_reject_token = null;
        $user->save();

        return response()->view('emails.verification-response', [
            'success' => true,
            'message' => 'Thank you for confirming! The user has been verified successfully.'
        ]);
    }

    public function rejectReference(Request $request)
    {
        $token = $request->query('token');
        $userId = $request->query('user');

        if (!$token || !$userId) {
            return response()->view('emails.verification-response', [
                'success' => false,
                'message' => 'Invalid verification link.'
            ]);
        }

        $user = User::find($userId);

        if (!$user) {
            return response()->view('emails.verification-response', [
                'success' => false,
                'message' => 'User not found.'
            ]);
        }

        // Verify token
        if (!$user->reference_reject_token || $user->reference_reject_token !== $token) {
            return response()->view('emails.verification-response', [
                'success' => false,
                'message' => 'Invalid or expired verification link.'
            ]);
        }

        // Check if already processed (null = not processed, 1 = verified, 0 = rejected)
        if ($user->is_verified !== null) {
            $message = $user->is_verified == 1 ? 'This user has already been verified.' : 'This user has already been marked as unknown.';
            return response()->view('emails.verification-response', [
                'success' => true,
                'message' => $message,
                'alreadyProcessed' => true
            ]);
        }

        // Update verification status to 0 (rejected)
        $user->is_verified = 0;
        $user->reference_verify_token = null;
        $user->reference_reject_token = null;
        $user->save();

        return response()->view('emails.verification-response', [
            'success' => true,
            'message' => 'Thank you for your response. The information has been recorded.'
        ]);
    }

    // Forgot Password Methods
    public function showForgotPasswordForm()
    {
        return view('frontend.pages.auth.forgot-password');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email'
        ], [
            'email.exists' => 'We could not find a user with that email address.'
        ]);

        $user = User::where('email', $request->email)->first();

        // Check if user is approved
        if (!$user->is_approved) {
            return back()->with('error', 'Your account is pending admin approval. Please wait for verification before resetting your password.');
        }

        // Check if user is active
        if (!$user->active) {
            return back()->with('error', 'Your account has been deactivated. Please contact support.');
        }

        // Generate password reset token
        $token = Str::random(64);

        // Store or update password reset token
        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $request->email],
            [
                'email' => $request->email,
                'token' => Hash::make($token),
                'created_at' => now()
            ]
        );

        // Create reset URL
        $resetUrl = route('password.reset', ['token' => $token, 'email' => $request->email]);

        // Send email
        try {
            Mail::to($user->email)->send(new \App\Mail\PasswordResetEmail(
                $resetUrl,
                $user->fname . ' ' . $user->lname,
                60 // expiry time in minutes
            ));

            return back()->with('success', 'We have sent a password reset link to your email address. Please check your inbox.');
        } catch (\Exception $e) {
            Log::error('Password reset email failed: ' . $e->getMessage());
            return back()->with('error', 'Failed to send password reset email. Please try again later.');
        }
    }

    public function showResetPasswordForm($token)
    {
        $email = request()->get('email');

        // Validate token and email
        $resetRecord = DB::table('password_reset_tokens')
            ->where('email', $email)
            ->first();

        if (!$resetRecord) {
            return redirect()->route('login')->with('error', 'Invalid password reset link.');
        }

        // Check if token is expired (60 minutes)
        $createdAt = \Carbon\Carbon::parse($resetRecord->created_at);
        if ($createdAt->addMinutes(60)->isPast()) {
            DB::table('password_reset_tokens')->where('email', $email)->delete();
            return redirect()->route('password.request')->with('error', 'This password reset link has expired. Please request a new one.');
        }

        // Verify token
        if (!Hash::check($token, $resetRecord->token)) {
            return redirect()->route('login')->with('error', 'Invalid password reset link.');
        }

        return view('frontend.pages.auth.reset-password', [
            'token' => $token,
            'email' => $email
        ]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email|exists:users,email',
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
                'regex:/[a-z]/',      // Must contain at least one lowercase letter
                'regex:/[A-Z]/',      // Must contain at least one uppercase letter
                'regex:/[0-9]/',      // Must contain at least one number
                'regex:/[@$!%*#?&]/', // Must contain at least one special character
            ],
        ], [
            'password.confirmed' => 'Password confirmation does not match.',
            'password.min' => 'Password must be at least 8 characters long.',
            'password.regex' => 'Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character (@$!%*#?&).',
        ]);

        // Get reset record
        $resetRecord = DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->first();

        if (!$resetRecord) {
            return back()->with('error', 'Invalid password reset link.');
        }

        // Check if token is expired (60 minutes)
        $createdAt = \Carbon\Carbon::parse($resetRecord->created_at);
        if ($createdAt->addMinutes(60)->isPast()) {
            DB::table('password_reset_tokens')->where('email', $request->email)->delete();
            return redirect()->route('password.request')->with('error', 'This password reset link has expired. Please request a new one.');
        }

        // Verify token
        if (!Hash::check($request->token, $resetRecord->token)) {
            return back()->with('error', 'Invalid password reset link.');
        }

        // Update user password
        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        // Delete the reset token
        DB::table('password_reset_tokens')->where('email', $request->email)->delete();

        // Log the user out from all devices
        DB::table('sessions')->where('user_id', $user->id)->delete();

        return redirect()->route('login')->with('success', 'Your password has been successfully reset! Please login with your new password.');
    }

    public function __destruct()
    {
        // Clean up old temp files (older than 1 hour)
        $tempPath = public_path('backend/uploads/temp');
        if (File::isDirectory($tempPath)) {
            $files = File::files($tempPath);
            foreach ($files as $file) {
                if (time() - File::lastModified($file) > 3600 && Str::startsWith(basename($file), 'temp_')) {
                    File::delete($file);
                }
            }
        }
    }

    // API method to get districts by division
    public function getDistricts($divisionId)
    {
        try {
            $districts = District::where('division_id', $divisionId)
                ->orderBy('name', 'asc')
                ->get(['id', 'name', 'name_bn']);

            return response()->json([
                'success' => true,
                'districts' => $districts
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch districts'
            ], 500);
        }
    }

    // API method to get upazilas by district
    public function getUpazilas($districtId)
    {
        try {
            $upazilas = Upazila::where('district_id', $districtId)
                ->orderBy('name', 'asc')
                ->get(['id', 'name', 'name_bn']);

            return response()->json([
                'success' => true,
                'upazilas' => $upazilas
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch upazilas'
            ], 500);
        }
    }

    // Show email verification notice
    public function verificationNotice()
    {
        $email = session('unverified_user_email');

        if (!$email) {
            return redirect()->route('login')->with('error', 'No verification pending.');
        }

        return view('frontend.pages.auth.verify-email', compact('email'));
    }
}
