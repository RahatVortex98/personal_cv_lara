<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Mail; // Import Mail
use App\Mail\ContactNotification;    // Import your Mailable

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string|max:5000',
        ]);

        // 1. Save the message to your database
        Message::create($validated);

        // 2. Send the Gmail notification to yourself
        // We pass the $validated array into the Mailable
        Mail::to('r072islam@gmail.com')->send(new ContactNotification($validated));

        return back()->with('success', 'Your message has been sent and I have been notified!');
    }
}