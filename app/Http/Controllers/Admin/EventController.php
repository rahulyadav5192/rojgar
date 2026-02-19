<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
            if ($event->image) {
                Storage::disk('public')->delete($event->image);
            }
            $data['image'] = $this->uploadImage($request->file('image'));
        }
        $event->update($data);
        return redirect()->route('admin.events.index')->with('success', 'Event updated successfully.');
    }

    public function destroy(Event $event): RedirectResponse
    {
        if ($event->image) {
            Storage::disk('public')->delete($event->image);
        }
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
            'status' => 'required|in:draft,published,cancelled',
            'who_can_apply' => 'required|in:all,man,woman',
            'featured' => 'sometimes|boolean',
        ];
        $data = $request->validate($rules);
        $data['featured'] = $request->boolean('featured');
        return $data;
    }

    private function uploadImage($file): ?string
    {
        if (! $file) {
            return null;
        }
        return $file->store('events', 'public');
    }
}
