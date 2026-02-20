<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'subject' => ['nullable', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
        ]);

        Contact::create($data);

        $successMessage = 'Thanks — your message has been received. We will get back to you soon.';

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json(['status' => 'success', 'message' => $successMessage]);
        }

        return back()->with('contact_success', $successMessage);
    }
}
