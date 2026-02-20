<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FooterContent;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FooterContentController extends Controller
{
    public function edit(): View
    {
        $footer = FooterContent::first() ?? FooterContent::create([]);
        return view('admin.content.footer.edit', compact('footer'));
    }

    public function update(Request $request): RedirectResponse
    {
        $footer = FooterContent::first() ?? FooterContent::create([]);

        $data = $request->validate([
            'address' => 'nullable|string|max:2000',
            'phone' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'instagram' => 'nullable|url|max:255',
            'facebook' => 'nullable|url|max:255',
            'x' => 'nullable|url|max:255',
            'pinterest' => 'nullable|url|max:255',
        ]);

        $footer->update($data);

        return redirect()->route('admin.content.footer.edit')->with('success', 'Footer updated.');
    }
}
