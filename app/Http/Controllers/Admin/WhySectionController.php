<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WhySection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WhySectionController extends Controller
{
    public function edit(): View
    {
        $why = WhySection::firstOrFail();
        return view('admin.content.why.edit', compact('why'));
    }

    public function update(Request $request): RedirectResponse
    {
        $why = WhySection::firstOrFail();
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'card1_title' => 'nullable|string|max:255',
            'card1_desc' => 'nullable|string',
            'card2_title' => 'nullable|string|max:255',
            'card2_desc' => 'nullable|string',
            'card3_title' => 'nullable|string|max:255',
            'card3_desc' => 'nullable|string',
            'card4_title' => 'nullable|string|max:255',
            'card4_desc' => 'nullable|string',
            'card5_title' => 'nullable|string|max:255',
            'card5_desc' => 'nullable|string',
            'card6_title' => 'nullable|string|max:255',
            'card6_desc' => 'nullable|string',
        ]);
        $why->update($request->only([
            'title', 'description',
            'card1_title', 'card1_desc', 'card2_title', 'card2_desc',
            'card3_title', 'card3_desc', 'card4_title', 'card4_desc',
            'card5_title', 'card5_desc', 'card6_title', 'card6_desc',
        ]));
        return redirect()->route('admin.content.why.edit')->with('success', 'Why section updated.');
    }
}
