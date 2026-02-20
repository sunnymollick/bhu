<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Mail\ContactReplyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    /**
     * Display a listing of all contacts
     */
    public function index(Request $request)
    {
        $query = Contact::orderBy('created_at', 'desc');

        // Apply filters based on query parameters
        if ($request->has('filter')) {
            $filter = $request->get('filter');

            if ($filter === 'unread') {
                $query->where('status', 'unread');
            } elseif ($filter === 'read') {
                $query->where('status', 'read');
            } elseif ($filter === 'replied') {
                $query->where('status', 'replied');
            }
        }

        $contacts = $query->paginate(20);
        return view('backend.pages.contact.index', compact('contacts'));
    }

    /**
     * Display the specified contact details
     */
    public function show($id)
    {
        $contact = Contact::findOrFail($id);

        // Mark as read when viewed
        if ($contact->status === 'unread') {
            $contact->update(['status' => 'read']);
        }

        return view('backend.pages.contact.show', compact('contact'));
    }

    /**
     * Reply to a contact message via email
     */
    public function reply(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'subject' => 'required|string|min:5|max:255',
            'message' => 'required|string|min:10|max:5000',
        ], [
            'subject.required' => 'Subject is required',
            'subject.min' => 'Subject must be at least 5 characters',
            'message.required' => 'Message is required',
            'message.min' => 'Message must be at least 10 characters',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            DB::beginTransaction();

            $contact = Contact::findOrFail($id);

            // Send reply email
            Mail::to($contact->email)->send(new ContactReplyEmail(
                $contact,
                $request->subject,
                $request->message
            ));

            // Append admin reply to message array (conversation)
            $conversation = $contact->message ?? [];
            $conversation[] = [
                'sender' => 'admin',
                'message' => $request->message,
                'subject' => $request->subject,
                'timestamp' => now()->toDateTimeString()
            ];

            // Update contact with new conversation and status
            $contact->update([
                'message' => $conversation,
                'status' => 'replied'
            ]);

            DB::commit();

            return redirect()->route('admin.contact.show', $id)
                ->with('success', 'Reply sent successfully!');

        } catch (\Exception $e) {
            DB::rollBack();

            // Log the actual error for debugging
            Log::error('Contact Reply Error: ' . $e->getMessage());

            return redirect()->back()
                ->with('error', 'Failed to send reply: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Delete a contact message
     */
    public function destroy($id)
    {
        try {
            $contact = Contact::findOrFail($id);
            $contact->delete();

            return redirect()->route('admin.contact.index')
                ->with('success', 'Contact message deleted successfully!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Failed to delete contact message.');
        }
    }

    /**
     * Update contact status
     */
    public function updateStatus(Request $request, $id)
    {
        try {
            $contact = Contact::findOrFail($id);
            $contact->update(['status' => $request->status]);

            return response()->json([
                'success' => true,
                'message' => 'Status updated successfully!'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update status.'
            ], 500);
        }
    }
}
