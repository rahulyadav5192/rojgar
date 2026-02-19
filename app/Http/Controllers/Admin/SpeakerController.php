<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Speaker;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class SpeakerController extends Controller
{
    public function index(): View
    {
        $speakers = Speaker::orderBy('sort_order')->orderBy('id')->paginate(12);
        return view('admin.content.speakers.index', compact('speakers'));
    }

    public function create(): View
    {
        $speaker = new Speaker;
        return view('admin.content.speakers.form', compact('speaker'));
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);
        $data['image'] = $request->hasFile('image') ? $request->file('image')->store('speakers', 'public') : null;
        $data['sort_order'] = Speaker::max('sort_order') + 1;
        Speaker::create($data);
        return redirect()->route('admin.content.speakers.index')->with('success', 'Speaker added.');
    }

    public function edit(Speaker $speaker): View
    {
        return view('admin.content.speakers.form', compact('speaker'));
    }

    public function update(Request $request, Speaker $speaker): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);
        if ($request->hasFile('image')) {
            if ($speaker->image) {
                Storage::disk('public')->delete($speaker->image);
            }
            $data['image'] = $request->file('image')->store('speakers', 'public');
        } else {
            unset($data['image']);
        }
        $speaker->update($data);
        return redirect()->route('admin.content.speakers.index')->with('success', 'Speaker updated.');
    }

    public function destroy(Speaker $speaker): RedirectResponse
    {
        if ($speaker->image) {
            Storage::disk('public')->delete($speaker->image);
        }
        $speaker->delete();
        return redirect()->route('admin.content.speakers.index')->with('success', 'Speaker deleted.');
    }
}
