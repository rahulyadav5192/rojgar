<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BannerContent;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Illuminate\View\View;

class BannerContentController extends Controller
{
    public function edit(): View
    {
        $banner = BannerContent::firstOrCreate([], [
            'image' => 'assets/img/hero-area.jpg',
        ]);

        return view('admin.content.banner.edit', compact('banner'));
    }

    public function update(Request $request): RedirectResponse
    {
        $banner = BannerContent::firstOrCreate([], [
            'image' => 'assets/img/hero-area.jpg',
        ]);

        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'mobile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);

        if ($request->hasFile('image')) {
            $this->deleteImage($banner->image);
            $banner->update([
                'image' => $this->uploadImage($request->file('image'), 'banner'),
            ]);
        }

        if ($request->hasFile('mobile_image')) {
            $this->deleteImage($banner->mobile_image);
            $banner->update([
                'mobile_image' => $this->uploadImage($request->file('mobile_image'), 'banner'),
            ]);
        }

        return redirect()->route('admin.content.banner.edit')->with('success', 'Banner updated successfully.');
    }

    private function uploadImage(?UploadedFile $file, string $subdir = 'banner'): ?string
    {
        if (! $file) {
            return null;
        }

        $directory = public_path('uploads/'.$subdir);
        if (! is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        $filename = uniqid('banner_').'.'.$file->getClientOriginalExtension();
        $file->move($directory, $filename);

        return 'uploads/'.$subdir.'/'.$filename;
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

