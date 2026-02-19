<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutContent;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
        ]);
        $about->update($request->only('title', 'description'));
        return redirect()->route('admin.content.about.edit')->with('success', 'About content updated.');
    }
}
