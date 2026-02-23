<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutContent;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AboutContentController extends Controller
{
    public function edit(): View
    {
        $about = AboutContent::firstOrFail();
        return view('admin.content.about.edit', compact('about'));
    }

    public function update(Request $request): RedirectResponse
    {
        $about = AboutContent::firstOrFail();
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);

        $data = $request->only('title', 'description');

        if ($request->hasFile('image')) {
            $this->deleteImage($about->image);
            $data['image'] = $this->uploadImage($request->file('image'));
        }

        $about->update($data);
        return redirect()->route('admin.content.about.edit')->with('success', 'About content updated.');
    }

    private function uploadImage(UploadedFile $file): string
    {
        $directory = public_path('uploads/about');
        if (! is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        $filename = uniqid('about_').'.'.$file->getClientOriginalExtension();
        $file->move($directory, $filename);

        return 'uploads/about/'.$filename;
    }

    private function deleteImage(?string $path): void
    {
        if (! $path || Str::startsWith($path, 'assets/')) {
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
