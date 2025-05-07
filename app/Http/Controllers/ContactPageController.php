<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContactPageController extends Controller
{
    public function showContactForm()
    {
        return view('contact');
    }

    public function handleSubmit(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'message' => 'required|string|min:10',
        ]);

        Log::info('Contact form submission received via Controller:', $validatedData);

        return back()->with('success', 'Your message has been sent successfully! We will contact you soon.');
    }
}
