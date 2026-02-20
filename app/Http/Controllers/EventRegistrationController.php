<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventRegistration;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventRegistrationController extends Controller
{
    public function store(Request $request): JsonResponse|RedirectResponse
    {
        $event = Event::findOrFail($request->input('event_id'));

        $data = $this->validateRegistration($request, $event);

        // Handle resume upload
        if ($request->hasFile('resume')) {
            $data['resume'] = $request->file('resume')->store('resumes', 'public');
        }

        $registration = EventRegistration::create($data);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Registration successful! We will contact you soon.',
                'registration' => $registration
            ], 201);
        }

        return redirect()->back()->with('registration_success', 'Registration submitted successfully!');
    }

    private function validateRegistration(Request $request, Event $event): array
    {
        $rules = [
            'event_id' => 'required|exists:events,id',
            'full_name' => 'required|string|max:255',
            'gender' => 'required|in:Male,Female,Other',
            'aadhaar_number' => 'required|string|max:20',
            'phone_number' => 'required|string|max:20',
            'email_address' => 'required|email|max:255',
            'college_university' => 'required|string|max:255',
            'qualification' => 'required|string|max:255',
            'referred_by' => 'nullable|string|max:255',
            'has_certifications' => 'sometimes|boolean',
            'certifications_detail' => 'nullable|string',
            'resume' => 'required|file|max:5120|mimes:pdf,jpg,jpeg,png,webp|mimetypes:application/pdf,image/jpeg,image/png,image/webp',
        ];

        if ($event->type === 'International') {
            $rules['passport_number'] = 'required|string|max:50';
        } else {
            $rules['passport_number'] = 'nullable|string|max:50';
        }

        $validated = $request->validate($rules);
        
        $validated['has_certifications'] = $request->boolean('has_certifications');
        $validated['event_id'] = $event->id;

        return $validated;
    }
}
