<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CounterContent;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CounterContentController extends Controller
{
    public function edit(): View
    {
        $counter = CounterContent::firstOrFail();
        return view('admin.content.counter.edit', compact('counter'));
    }

    public function update(Request $request): RedirectResponse
    {
        $counter = CounterContent::firstOrFail();
        $request->validate([
            'speakers_count' => 'required|integer|min:0',
            'seats_count' => 'required|integer|min:0',
            'sponsors_count' => 'required|integer|min:0',
            'sessions_count' => 'required|integer|min:0',
        ]);
        $counter->update($request->only('speakers_count', 'seats_count', 'sponsors_count', 'sessions_count'));
        return redirect()->route('admin.content.counter.edit')->with('success', 'Counter updated.');
    }
}
