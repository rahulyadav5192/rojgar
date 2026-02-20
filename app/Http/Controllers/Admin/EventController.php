<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EventController extends Controller
{
    public function index(): View
    {
        $events = Event::orderBy('start_date', 'desc')->paginate(10);
        return view('admin.events.index', compact('events'));
    }

    public function create(): View
    {
        $event = new Event;
        return view('admin.events.form', compact('event'));
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validateEvent($request);
        unset($data['image']);
        $data['image'] = $this->uploadImage($request->file('image'));
        Event::create($data);
        return redirect()->route('admin.events.index')->with('success', 'Event created successfully.');
    }

    public function edit(Event $event): View
    {
        return view('admin.events.form', compact('event'));
    }

    public function update(Request $request, Event $event): RedirectResponse
    {
        $data = $this->validateEvent($request, $event);
        unset($data['image']);
        if ($request->hasFile('image')) {
            $this->deleteImage($event->image);
            $data['image'] = $this->uploadImage($request->file('image'));
        }
        $event->update($data);
        return redirect()->route('admin.events.index')->with('success', 'Event updated successfully.');
    }

    public function destroy(Event $event): RedirectResponse
    {
        $this->deleteImage($event->image);
        $event->delete();
        return redirect()->route('admin.events.index')->with('success', 'Event deleted successfully.');
    }

    private function validateEvent(Request $request, ?Event $event = null): array
    {
        $rules = [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'image' => $event ? 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048' : 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'timing' => 'nullable|string|max:100',
            'type' => 'required|in:Domestic,International',
            'status' => 'required|in:draft,published,cancelled',
            'who_can_apply' => 'required|in:all,man,woman',
            'featured' => 'sometimes|boolean',
        ];
        $data = $request->validate($rules);
        $data['type'] = $request->input('type');
        $data['featured'] = $request->boolean('featured');
        return $data;
    }

    private function uploadImage(?UploadedFile $file): ?string
    {
        if (! $file) {
            return null;
        }

        $directory = public_path('uploads/events');
        if (! is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        $filename = uniqid('event_').'.'.$file->getClientOriginalExtension();
        $file->move($directory, $filename);

        return 'uploads/events/'.$filename;
    }

    private function deleteImage(?string $path): void
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
