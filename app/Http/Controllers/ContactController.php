<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactFormMailable;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function send(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        // Collect the details from the request
        $details = $request->only(['name', 'email', 'message']);

        // Send the email
        Mail::to('negreaflorina3@gmail.com')->send(new ContactFormMailable($details));

        // Return a response back to the user
        return back()->with('success', 'Thank you for contacting us! We will get back to you soon.');
    }
}
