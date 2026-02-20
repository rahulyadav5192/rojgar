<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sponsor;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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

        $path = $request->file('image')->store('sponsors', 'public');
        Sponsor::create([
            'image' => $path,
            'link' => $request->input('link'),
        ]);

        return redirect()->route('admin.content.sponsors.index')->with('success', 'Sponsor uploaded successfully.');
    }

    public function destroy(Sponsor $sponsor): RedirectResponse
    {
        Storage::disk('public')->delete($sponsor->image);
        $sponsor->delete();
        return redirect()->route('admin.content.sponsors.index')->with('success', 'Sponsor removed successfully.');
    }
}
