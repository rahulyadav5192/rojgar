<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventRegistration;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

class EventRegistrationController extends Controller
{
    public function index(Request $request): View
    {
        $events = Event::orderBy('title')->get(['id', 'title', 'type']);
        $filters = $this->extractFilters($request);

        $registrationsQuery = EventRegistration::query()->with('event');
        $this->applyFilters($registrationsQuery, $filters);

        $registrations = $registrationsQuery
            ->orderByDesc('created_at')
            ->paginate(20)
            ->withQueryString();

        return view('admin.registrations.index', compact('registrations', 'events', 'filters'));
    }

    public function show(EventRegistration $registration): View
    {
        $registration->load('event');

        return view('admin.registrations.show', compact('registration'));
    }

    public function edit(EventRegistration $registration): View
    {
        $registration->load('event');
        $events = Event::orderBy('title')->get(['id', 'title', 'type']);

        return view('admin.registrations.form', compact('registration', 'events'));
    }

    public function update(Request $request, EventRegistration $registration): RedirectResponse
    {
        $event = Event::findOrFail((int) $request->input('event_id', $registration->event_id));
        $data = $this->validateRegistration($request, $event, true);

        if ($request->hasFile('resume')) {
            $this->deleteFile($registration->resume);
            $data['resume'] = $this->uploadResume($request->file('resume'));
        }

        $registration->update($data);

        return redirect()->route('admin.registrations.show', $registration)->with('success', 'Registration updated successfully.');
    }

    public function destroy(EventRegistration $registration): RedirectResponse
    {
        $this->deleteFile($registration->resume);
        $registration->delete();

        return redirect()->route('admin.registrations.index')->with('success', 'Registration deleted successfully.');
    }

    public function export(Request $request): StreamedResponse
    {
        $filters = $this->extractFilters($request);

        $registrationsQuery = EventRegistration::query()->with('event');
        $this->applyFilters($registrationsQuery, $filters);

        $registrations = $registrationsQuery->orderByDesc('created_at')->get();
        $fileName = 'event-registrations-'.now()->format('Ymd-His').'.csv';

        return response()->streamDownload(function () use ($registrations): void {
            $output = fopen('php://output', 'w');

            fputcsv($output, [
                'ID',
                'Event ID',
                'Event Title',
                'Event Type',
                'Full Name',
                'Gender',
                'Aadhaar Number',
                'Phone Number',
                'Email Address',
                'College/University',
                'Qualification',
                'Referred By',
                'Has Certifications',
                'Certifications Detail',
                'Resume Path',
                'Resume Doc URL',
                'Passport Number',
                'Registered At',
                'Updated At',
            ]);

            foreach ($registrations as $registration) {
                fputcsv($output, [
                    $registration->id,
                    $registration->event_id,
                    $registration->event?->title ?? '',
                    $registration->event?->type ?? '',
                    $registration->full_name,
                    $registration->gender,
                    $registration->aadhaar_number,
                    $registration->phone_number,
                    $registration->email_address,
                    $registration->college_university,
                    $registration->qualification,
                    $registration->referred_by,
                    $registration->has_certifications ? 'Yes' : 'No',
                    $registration->certifications_detail,
                    $registration->resume,
                    $registration->resume_url,
                    $registration->passport_number,
                    $registration->created_at?->toDateTimeString(),
                    $registration->updated_at?->toDateTimeString(),
                ]);
            }

            fclose($output);
        }, $fileName, [
            'Content-Type' => 'text/csv; charset=UTF-8',
        ]);
    }

    private function extractFilters(Request $request): array
    {
        return [
            'event_id' => $request->input('event_id'),
            'date_filter' => $request->input('date_filter', ''),
            'from_date' => $request->input('from_date'),
            'to_date' => $request->input('to_date'),
        ];
    }

    private function applyFilters(Builder $query, array $filters): void
    {
        if (! empty($filters['event_id'])) {
            $query->where('event_id', $filters['event_id']);
        }

        switch ($filters['date_filter']) {
            case 'today':
                $today = now();
                $query->whereBetween('created_at', [$today->copy()->startOfDay(), $today->copy()->endOfDay()]);
                break;
            case 'yesterday':
                $yesterday = now()->subDay();
                $query->whereBetween('created_at', [$yesterday->copy()->startOfDay(), $yesterday->copy()->endOfDay()]);
                break;
            case 'last_7_days':
                $query->whereBetween('created_at', [now()->subDays(6)->startOfDay(), now()->endOfDay()]);
                break;
            case 'custom':
                $from = $this->parseFilterDate($filters['from_date'] ?? null, false);
                $to = $this->parseFilterDate($filters['to_date'] ?? null, true);

                if ($from && $to && $from->gt($to)) {
                    [$from, $to] = [$to->copy()->startOfDay(), $from->copy()->endOfDay()];
                }

                if ($from && $to) {
                    $query->whereBetween('created_at', [$from, $to]);
                } elseif ($from) {
                    $query->where('created_at', '>=', $from);
                } elseif ($to) {
                    $query->where('created_at', '<=', $to);
                }
                break;
        }
    }

    private function parseFilterDate(?string $value, bool $endOfDay): ?Carbon
    {
        if (! $value) {
            return null;
        }

        try {
            $date = Carbon::createFromFormat('Y-m-d', $value);
        } catch (\Throwable $exception) {
            return null;
        }

        return $endOfDay ? $date->endOfDay() : $date->startOfDay();
    }

    private function validateRegistration(Request $request, Event $event, bool $isUpdate = false): array
    {
        $resumeRule = ($isUpdate ? 'nullable' : 'required')
            .'|file|max:5120|mimes:pdf,jpg,jpeg,png,webp|mimetypes:application/pdf,image/jpeg,image/png,image/webp';

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
            'resume' => $resumeRule,
        ];

        if ($event->type === 'International') {
            $rules['passport_number'] = 'required|string|max:50';
        } else {
            $rules['passport_number'] = 'nullable|string|max:50';
        }

        $validated = $request->validate($rules);
        $validated['event_id'] = $event->id;
        $validated['has_certifications'] = $request->boolean('has_certifications');

        if (! $validated['has_certifications']) {
            $validated['certifications_detail'] = null;
        }

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

    private function deleteFile(?string $path): void
    {
        if (! $path) {
            return;
        }

        $publicPath = public_path($path);
        if (file_exists($publicPath)) {
            unlink($publicPath);
        }

        $legacyStoragePath = storage_path('app/public/'.$path);
        if (file_exists($legacyStoragePath)) {
            unlink($legacyStoragePath);
        }
    }
}
