<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventRegistration;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\View\View;

class EventRegistrationController extends Controller
{
    public function create(Event $event): View
    {
        return view('register', compact('event'));
    }

    public function store(Request $request): JsonResponse|RedirectResponse
    {
        $event = Event::findOrFail($request->input('event_id'));

        $data = $this->validateRegistration($request, $event);

        // Handle resume upload
        if ($request->hasFile('resume')) {
            $data['resume'] = $this->uploadResume($request->file('resume'));
        }

        // Handle passport image when process is International
        if (($request->input('process') === 'International') && $request->hasFile('passport_image')) {
            $data['passport_image'] = $this->uploadPassportImage($request->file('passport_image'));
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
        $isInternational = $request->input('process') === 'International';

        $rules = [
            'event_id' => 'required|exists:events,id',
            'process' => 'required|in:Domestic,International',
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
            'passport_number' => $isInternational ? 'required|string|max:50' : 'nullable|string|max:50',
            'passport_image' => $isInternational ? 'required|file|max:5120|mimes:jpg,jpeg,png,webp|mimetypes:image/jpeg,image/png,image/webp' : 'nullable|file|max:5120|mimes:jpg,jpeg,png,webp|mimetypes:image/jpeg,image/png,image/webp',
        ];

        $validated = $request->validate($rules);

        $validated['has_certifications'] = $request->boolean('has_certifications');
        $validated['event_id'] = $event->id;
        $validated['process'] = $request->input('process');

        if (! $isInternational) {
            $validated['passport_number'] = null;
        }

        // passport_image is stored via uploadPassportImage(); do not pass file object to create()
        unset($validated['passport_image']);

        return $validated;
    }

    private function uploadResume(?UploadedFile $file): ?string
    {
        if (! $file) {
            return null;
        }

        $directory = public_path('uploads/resumes');
        if (! is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        $filename = uniqid('resume_').'.'.$file->getClientOriginalExtension();
        $file->move($directory, $filename);

        return 'uploads/resumes/'.$filename;
    }

    private function uploadPassportImage(UploadedFile $file): string
    {
        $directory = public_path('uploads/passports');
        if (! is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        $filename = uniqid('passport_').'.'.$file->getClientOriginalExtension();
        $file->move($directory, $filename);

        return 'uploads/passports/'.$filename;
    }
}
