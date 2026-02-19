<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class GalleryController extends Controller
{
    public function index(): View
    {
        $images = GalleryImage::orderBy('created_at', 'desc')->paginate(24);
        return view('admin.gallery.index', compact('images'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'caption' => 'nullable|string|max:255',
        ]);

        $path = $request->file('image')->store('gallery', 'public');
        GalleryImage::create([
            'image' => $path,
            'caption' => $request->input('caption'),
        ]);

        return redirect()->route('admin.gallery.index')->with('success', 'Image uploaded successfully.');
    }

    public function destroy(GalleryImage $gallery_image): RedirectResponse
    {
        Storage::disk('public')->delete($gallery_image->image);
        $gallery_image->delete();
        return redirect()->route('admin.gallery.index')->with('success', 'Image deleted successfully.');
    }
}
