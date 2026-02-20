<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sponsor;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\View\View;

class SponsorController extends Controller
{
    public function index(): View
    {
        $sponsors = Sponsor::orderByDesc('created_at')->paginate(24);
        return view('admin.content.sponsors.index', compact('sponsors'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'link' => 'nullable|url|max:255',
        ]);

        $path = $this->uploadImage($request->file('image'));
        Sponsor::create([
            'image' => $path,
            'link' => $request->input('link'),
        ]);

        return redirect()->route('admin.content.sponsors.index')->with('success', 'Sponsor uploaded successfully.');
    }

    public function destroy(Sponsor $sponsor): RedirectResponse
    {
        $this->deleteImage($sponsor->image);
        $sponsor->delete();
        return redirect()->route('admin.content.sponsors.index')->with('success', 'Sponsor removed successfully.');
    }

    private function uploadImage(?UploadedFile $file): ?string
    {
        if (! $file) {
            return null;
        }

        $directory = public_path('uploads/sponsors');
        if (! is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        $filename = uniqid('sponsor_').'.'.$file->getClientOriginalExtension();
        $file->move($directory, $filename);

        return 'uploads/sponsors/'.$filename;
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
