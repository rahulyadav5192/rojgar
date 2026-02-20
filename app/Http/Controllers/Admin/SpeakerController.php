<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Speaker;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
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
        $data['image'] = $request->hasFile('image') ? $this->uploadImage($request->file('image')) : null;
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
            $this->deleteImage($speaker->image);
            $data['image'] = $this->uploadImage($request->file('image'));
        } else {
            unset($data['image']);
        }
        $speaker->update($data);
        return redirect()->route('admin.content.speakers.index')->with('success', 'Speaker updated.');
    }

    public function destroy(Speaker $speaker): RedirectResponse
    {
        $this->deleteImage($speaker->image);
        $speaker->delete();
        return redirect()->route('admin.content.speakers.index')->with('success', 'Speaker deleted.');
    }

    private function uploadImage(?UploadedFile $file): ?string
    {
        if (! $file) {
            return null;
        }

        $directory = public_path('uploads/speakers');
        if (! is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        $filename = uniqid('speaker_').'.'.$file->getClientOriginalExtension();
        $file->move($directory, $filename);

        return 'uploads/speakers/'.$filename;
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
