<?php

namespace App\Http\Controllers;

use App\Models\AboutContent;
use App\Models\BannerContent;
use App\Models\ConferenceContent;
use App\Models\CounterContent;
use App\Models\Event;
use App\Models\GalleryImage;
use App\Models\Blog;
use App\Models\Speaker;
use App\Models\Sponsor;
use App\Models\Testimonial;
use App\Models\FooterContent;
use App\Models\WhySection;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $homeCacheTtlMinutes = max(1, (int) config('cache.home_ttl_minutes', 10));

        $data = Cache::remember('home.index.data.v1', now()->addMinutes($homeCacheTtlMinutes), function (): array {
            $featuredEvents = Event::query()
                ->select(['id', 'title', 'description', 'location', 'image', 'start_date', 'timing'])
                ->where('featured', true)
                ->where('status', 'published')
                ->orderByDesc('start_date')
                ->limit(2)
                ->get();

            $upcomingEvents = Event::query()
                ->select(['id', 'title', 'description', 'location', 'type', 'image', 'start_date', 'end_date', 'timing'])
                ->where('status', 'published')
                ->orderBy('start_date')
                ->get();

            $galleryImages = GalleryImage::query()
                ->select(['id', 'image', 'caption', 'created_at'])
                ->orderByDesc('created_at')
                ->get();

            $latestBlogs = Blog::query()
                ->select(['id', 'title', 'slug', 'excerpt', 'body', 'image', 'published_at', 'created_at'])
                ->published()
                ->orderByDesc('published_at')
                ->orderByDesc('created_at')
                ->limit(3)
                ->get();

            return [
                'featuredEvents' => $featuredEvents,
                'upcomingEvents' => $upcomingEvents,
                'galleryImages' => $galleryImages,
                'latestBlogs' => $latestBlogs,
                'aboutContent' => AboutContent::query()->select(['id', 'title', 'description', 'image'])->first(),
                'bannerContent' => BannerContent::query()->select(['id', 'image', 'mobile_image'])->first(),
                'conferenceContent' => ConferenceContent::query()->select(['id', 'image', 'location', 'date_time', 'speakers_text', 'seats_text'])->first(),
                'whySection' => WhySection::first(),
                'counterContent' => CounterContent::query()->select(['id', 'speakers_count', 'seats_count', 'sponsors_count', 'sessions_count'])->first(),
                'speakers' => Speaker::query()->select(['id', 'name', 'designation', 'image', 'sort_order'])->orderBy('sort_order')->orderBy('id')->get(),
                'sponsors' => Sponsor::query()->select(['id', 'image', 'link'])->orderBy('id')->get(),
                'testimonials' => Testimonial::query()->select(['id', 'name', 'designation', 'image', 'description', 'sort_order'])->orderBy('sort_order')->orderBy('id')->get(),
                'footer' => FooterContent::query()->select(['id', 'address', 'phone', 'email', 'google_map_embed_url', 'instagram', 'facebook', 'x', 'pinterest'])->first(),
            ];
        });

        return view('home', $data);
    }

    public function gallery(): View
    {
        $images = GalleryImage::query()
            ->select(['id', 'image', 'caption', 'created_at'])
            ->orderByDesc('created_at')
            ->get();

        return view('gallery', compact('images'));
    }
}
