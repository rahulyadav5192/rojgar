<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Blog;
use App\Models\Contact;
use App\Models\Event;
use App\Models\EventRegistration;
use App\Models\GalleryImage;
use App\Models\Speaker;
use App\Models\Subscriber;
use App\Models\Sponsor;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function showLogin(): View
    {
        return view('admin.auth.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (Auth::guard('admin')->attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'));
        }

        return back()->with('error', 'Invalid email or password.')->withInput($request->only('email'));
    }

    public function dashboard(): View
    {
        $today = now();
        $todayStart = $today->copy()->startOfDay();
        $todayEnd = $today->copy()->endOfDay();

        $stats = [
            'total_events' => Event::count(),
            'published_events' => Event::where('status', 'published')->count(),
            'draft_events' => Event::where('status', 'draft')->count(),
            'cancelled_events' => Event::where('status', 'cancelled')->count(),
            'total_registrations' => EventRegistration::count(),
            'today_registrations' => EventRegistration::whereBetween('created_at', [$todayStart, $todayEnd])->count(),
            'month_registrations' => EventRegistration::whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()])->count(),
            'total_blogs' => Blog::count(),
            'published_blogs' => Blog::where('status', Blog::STATUS_PUBLISHED)->count(),
            'draft_blogs' => Blog::where('status', Blog::STATUS_DRAFT)->count(),
            'total_contacts' => Contact::count(),
            'total_subscribers' => Subscriber::count(),
            'total_gallery_images' => GalleryImage::count(),
            'total_speakers' => Speaker::count(),
            'total_sponsors' => Sponsor::count(),
        ];

        $topEventRegistrationRows = Event::query()
            ->leftJoin('event_registrations', 'events.id', '=', 'event_registrations.event_id')
            ->select('events.id', 'events.title', DB::raw('COUNT(event_registrations.id) as registrations_count'))
            ->groupBy('events.id', 'events.title')
            ->orderByDesc('registrations_count')
            ->orderByDesc('events.id')
            ->limit(8)
            ->get();

        $eventRegistrationLabels = $topEventRegistrationRows->map(
            fn ($row) => \Illuminate\Support\Str::limit($row->title, 28)
        )->values();
        $eventRegistrationCounts = $topEventRegistrationRows->pluck('registrations_count')->map(fn ($count) => (int) $count)->values();

        $months = collect(range(5, 0))->map(fn (int $i) => now()->subMonths($i)->startOfMonth());
        $fromDate = now()->subMonths(5)->startOfMonth();

        $monthlyEventCounts = Event::query()
            ->selectRaw("DATE_FORMAT(created_at, '%Y-%m') as month_key, COUNT(*) as total")
            ->where('created_at', '>=', $fromDate)
            ->groupBy('month_key')
            ->pluck('total', 'month_key');

        $monthlyRegistrationCounts = EventRegistration::query()
            ->selectRaw("DATE_FORMAT(created_at, '%Y-%m') as month_key, COUNT(*) as total")
            ->where('created_at', '>=', $fromDate)
            ->groupBy('month_key')
            ->pluck('total', 'month_key');

        $chartMonthLabels = $months->map(fn (Carbon $month) => $month->format('M Y'))->values();
        $chartEventSeries = $months->map(fn (Carbon $month) => (int) ($monthlyEventCounts[$month->format('Y-m')] ?? 0))->values();
        $chartRegistrationSeries = $months->map(fn (Carbon $month) => (int) ($monthlyRegistrationCounts[$month->format('Y-m')] ?? 0))->values();

        $recentRegistrations = EventRegistration::query()
            ->with('event')
            ->latest()
            ->take(6)
            ->get();

        return view('admin.dashboard', compact(
            'stats',
            'eventRegistrationLabels',
            'eventRegistrationCounts',
            'chartMonthLabels',
            'chartEventSeries',
            'chartRegistrationSeries',
            'recentRegistrations'
        ));
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }

    public function redirectToDashboard(): RedirectResponse
    {
        return redirect()->route('admin.dashboard');
    }

    public function clearCache(Request $request): RedirectResponse
    {
        Cache::forget('home.index.data.v1');

        return back()->with('admin_notice', 'Website cache cleared successfully.');
    }

    public function showRegister(): View
    {
        return view('admin.auth.register');
    }

    public function register(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:admins,email',
            'password' => 'required|string|min:6|confirmed',
            'terms' => 'accepted',
        ]);

        $admin = Admin::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);

        Auth::guard('admin')->login($admin);
        $request->session()->regenerate();
        return redirect()->route('admin.dashboard');
    }

    public function showForgotPassword(): View
    {
        return view('admin.auth.forgot-password');
    }

    public function sendResetLink(Request $request): RedirectResponse
    {
        $request->validate(['email' => 'required|email']);

        $admin = Admin::where('email', $request->input('email'))->first();
        if ($admin) {
            // In production: send password reset email, store token, etc.
        }

        return back()->with('status', 'If that email exists, we have sent a reset link.');
    }
}
