<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\View\View;

class ContactSubmissionController extends Controller
{
    public function index(): View
    {
        $contacts = Contact::query()
            ->latest()
            ->paginate(20);

        return view('admin.contacts.index', compact('contacts'));
    }
}

