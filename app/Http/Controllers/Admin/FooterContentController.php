<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FooterContent;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class FooterContentController extends Controller
{
    private const DEFAULT_MAP_EMBED_URL = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15864.15480778837!2d-77.44908382752939!3d38.953293865566366!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x6775cb22a9fa1341!2sThe+Firkin+%26+Fox!5e0!3m2!1sen!2sbd!4v1543773685573';

    public function edit(): View
    {
        $footer = $this->footerRecord();

        return view('admin.content.footer.edit', compact('footer'));
    }

    public function update(Request $request): RedirectResponse
    {
        $footer = $this->footerRecord();

        $data = $request->validate([
            'address' => 'nullable|string|max:2000',
            'phone' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'google_map_embed_url' => 'nullable|url|max:2000',
            'instagram' => 'nullable|url|max:255',
            'facebook' => 'nullable|url|max:255',
            'x' => 'nullable|url|max:255',
            'pinterest' => 'nullable|url|max:255',
        ]);

        $footer->update($data);
        Cache::forget('home.index.data.v1');

        return redirect()->route('admin.content.footer.edit')->with('success', 'Footer updated.');
    }

    private function footerRecord(): FooterContent
    {
        $footer = FooterContent::first();

        if (!$footer) {
            return FooterContent::create([
                'google_map_embed_url' => self::DEFAULT_MAP_EMBED_URL,
            ]);
        }

        if (!$footer->google_map_embed_url) {
            $footer->google_map_embed_url = self::DEFAULT_MAP_EMBED_URL;
            $footer->save();
        }

        return $footer;
    }
}
