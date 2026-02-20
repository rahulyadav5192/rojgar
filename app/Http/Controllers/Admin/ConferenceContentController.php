<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ConferenceContent;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
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
            $this->deleteImage($conference->image);
            $data['image'] = $this->uploadImage($request->file('image'));
        }
        $conference->update($data);
        return redirect()->route('admin.content.conference.edit')->with('success', 'Conference content updated.');
    }

    private function uploadImage(?UploadedFile $file): ?string
    {
        if (! $file) {
            return null;
        }

        $directory = public_path('uploads/conference');
        if (! is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        $filename = uniqid('conference_').'.'.$file->getClientOriginalExtension();
        $file->move($directory, $filename);

        return 'uploads/conference/'.$filename;
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
