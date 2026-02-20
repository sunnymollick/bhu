<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Mail\ContactNotificationEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function index()
    {
        return view('frontend.pages.contact');
    }

    public function store(Request $request)
    {
        // Real-time validation rules
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|string|min:3|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|min:5|max:255',
            'message' => 'required|string|min:10|max:5000',
        ], [
            'full_name.required' => 'Full name is required',
            'full_name.min' => 'Full name must be at least 3 characters',
            'email.required' => 'Email address is required',
            'email.email' => 'Please enter a valid email address',
            'subject.required' => 'Subject is required',
            'subject.min' => 'Subject must be at least 5 characters',
            'message.required' => 'Message is required',
            'message.min' => 'Message must be at least 10 characters',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Use DB transaction for data integrity
            DB::beginTransaction();

            // Create contact entry with message as conversation array
            $contact = Contact::create([
                'full_name' => $request->full_name,
                'email' => $request->email,
                'subject' => $request->subject,
                'message' => [
                    [
                        'sender' => 'user',
                        'message' => $request->message,
                        'timestamp' => now()->toDateTimeString()
                    ]
                ],
                'status' => 'unread'
            ]);

            // Email notification removed - Admin will respond via webmail directly

            // Commit transaction
            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Thank you for contacting us! We will get back to you soon.',
                'data' => $contact
            ], 200);

        } catch (\Exception $e) {
            // Rollback transaction on error
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => 'Something went wrong. Please try again later.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
