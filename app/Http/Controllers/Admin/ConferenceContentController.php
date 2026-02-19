<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ConferenceContent;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ConferenceContentController extends Controller
{
    public function edit(): View
    {
        $conference = ConferenceContent::firstOrFail();
        return view('admin.content.conference.edit', compact('conference'));
    }

    public function update(Request $request): RedirectResponse
    {
        $conference = ConferenceContent::firstOrFail();
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'location' => 'nullable|string|max:255',
            'date_time' => 'nullable|string|max:255',
            'speakers_text' => 'nullable|string|max:255',
            'seats_text' => 'nullable|string|max:255',
        ]);
        $data = $request->only('location', 'date_time', 'speakers_text', 'seats_text');
        if ($request->hasFile('image')) {
            if ($conference->image) {
                Storage::disk('public')->delete($conference->image);
            }
            $data['image'] = $request->file('image')->store('conference', 'public');
        }
        $conference->update($data);
        return redirect()->route('admin.content.conference.edit')->with('success', 'Conference content updated.');
    }
}
