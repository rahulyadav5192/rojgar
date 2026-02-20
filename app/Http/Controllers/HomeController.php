<?php

namespace App\Http\Controllers;

use App\Models\AboutContent;
use App\Models\ConferenceContent;
use App\Models\CounterContent;
use App\Models\Event;
use App\Models\GalleryImage;
use App\Models\Blog;
use App\Models\Speaker;
use App\Models\Sponsor;
use App\Models\FooterContent;
use App\Models\WhySection;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $featuredEvents = Event::where('featured', true)
            ->where('status', 'published')
            ->orderBy('start_date', 'desc')
            ->take(2)
            ->get();

        $upcomingEvents = Event::where('status', 'published')
            ->orderBy('start_date', 'asc')
            ->get();

        $galleryImages = GalleryImage::orderBy('created_at', 'desc')->get();

        $latestBlogs = Blog::published()
            ->orderByDesc('published_at')
            ->orderByDesc('created_at')
            ->take(3)
            ->get();

        $aboutContent = AboutContent::first();
        $conferenceContent = ConferenceContent::first();
        $whySection = WhySection::first();
        $counterContent = CounterContent::first();
        $speakers = Speaker::orderBy('sort_order')->orderBy('id')->get();
        $sponsors = Sponsor::orderBy('id')->get();
        $footer = FooterContent::first();

        return view('home', compact(
            'featuredEvents', 'upcomingEvents', 'galleryImages', 'latestBlogs',
            'aboutContent', 'conferenceContent', 'whySection', 'counterContent', 'speakers', 'sponsors', 'footer'
        ));
    }
}
