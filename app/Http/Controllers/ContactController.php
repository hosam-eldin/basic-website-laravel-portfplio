<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function contact()
    {
        return view('frontend.contact');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
            'subject' => 'required|string|max:255',
            'phone' => 'required|string|max:20',

        ]);

        // Store the contact message in the database (assuming you have a Contact model)
        Contact::insert([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            'subject' => $request->subject,
            'phone' => $request->phone,
            'created_at' => Carbon::now(),

        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }

    public function adminContact()
    {
        $user = Auth::user();
        $messages = Contact::latest()->get();
        return view('admin.contact.contact', compact('messages', 'user'));
    }

    public function deleteMessage($id)
    {
        $message = Contact::findOrFail($id);
        $message->delete();

        return redirect()->back()->with('success', 'Message deleted successfully!');
    }
}
