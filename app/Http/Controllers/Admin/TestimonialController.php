<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\View\View;

class TestimonialController extends Controller
{
    public function index(): View
    {
        $testimonials = Testimonial::orderBy('sort_order')->orderBy('id')->paginate(12);
        return view('admin.content.testimonials.index', compact('testimonials'));
    }

    public function create(): View
    {
        $testimonial = new Testimonial;
        return view('admin.content.testimonials.form', compact('testimonial'));
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'description' => 'required|string|max:5000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);
        $data['image'] = $request->hasFile('image') ? $this->uploadImage($request->file('image')) : null;
        $data['sort_order'] = Testimonial::max('sort_order') + 1;
        Testimonial::create($data);
        return redirect()->route('admin.content.testimonials.index')->with('success', 'Testimonial added.');
    }

    public function edit(Testimonial $testimonial): View
    {
        return view('admin.content.testimonials.form', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'description' => 'required|string|max:5000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);
        if ($request->hasFile('image')) {
            $this->deleteImage($testimonial->image);
            $data['image'] = $this->uploadImage($request->file('image'));
        } else {
            unset($data['image']);
        }
        $testimonial->update($data);
        return redirect()->route('admin.content.testimonials.index')->with('success', 'Testimonial updated.');
    }

    public function destroy(Testimonial $testimonial): RedirectResponse
    {
        $this->deleteImage($testimonial->image);
        $testimonial->delete();
        return redirect()->route('admin.content.testimonials.index')->with('success', 'Testimonial deleted.');
    }

    private function uploadImage(?UploadedFile $file): ?string
    {
        if (! $file) {
            return null;
        }

        $directory = public_path('uploads/testimonials');
        if (! is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        $filename = uniqid('testimonial_').'.'.$file->getClientOriginalExtension();
        $file->move($directory, $filename);

        return 'uploads/testimonials/'.$filename;
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
