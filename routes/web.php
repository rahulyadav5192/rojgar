<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\AboutContentController;
use App\Http\Controllers\Admin\ConferenceContentController;
use App\Http\Controllers\Admin\CounterContentController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\SpeakerController;
use App\Http\Controllers\Admin\FooterContentController;
use App\Http\Controllers\Admin\SponsorController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\WhySectionController;
use App\Http\Controllers\Admin\EventRegistrationController as AdminEventRegistrationController;
use App\Http\Controllers\Admin\ContactSubmissionController as AdminContactSubmissionController;
use App\Http\Controllers\Admin\SubscriberController as AdminSubscriberController;
use App\Http\Controllers\Admin\BannerContentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EventRegistrationController;
use App\Http\Controllers\SubscribeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.submit');
Route::post('/subscribe', [SubscribeController::class, 'store'])->name('subscribe.store');
Route::post('/event-registration', [EventRegistrationController::class, 'store'])->name('event-registration.store');

// Admin routes (Sneat template)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('admin.guest')->group(function () {
        Route::get('login', [AdminController::class, 'showLogin'])->name('login');
        Route::post('login', [AdminController::class, 'login'])->name('login.submit');
        Route::get('register', [AdminController::class, 'showRegister'])->name('register');
        Route::post('register', [AdminController::class, 'register'])->name('register.submit');
        Route::get('forgot-password', [AdminController::class, 'showForgotPassword'])->name('password.request');
        Route::post('forgot-password', [AdminController::class, 'sendResetLink'])->name('password.email');
    });

    Route::middleware('auth:admin')->group(function () {
        Route::get('/', [AdminController::class, 'redirectToDashboard']);
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::post('cache/clear', [AdminController::class, 'clearCache'])->name('cache.clear');
        Route::post('logout', [AdminController::class, 'logout'])->name('logout');
        Route::resource('events', EventController::class)->except('show');
        Route::get('registrations/export', [AdminEventRegistrationController::class, 'export'])->name('registrations.export');
        Route::resource('registrations', AdminEventRegistrationController::class)->only(['index', 'show', 'edit', 'update', 'destroy']);
        Route::get('contacts', [AdminContactSubmissionController::class, 'index'])->name('contacts.index');
        Route::get('subscribers', [AdminSubscriberController::class, 'index'])->name('subscribers.index');
        Route::resource('blogs', AdminBlogController::class)->except('show');
        Route::get('gallery', [GalleryController::class, 'index'])->name('gallery.index');
        Route::get('blog/{slug}', [\App\Http\Controllers\BlogController::class, 'show'])->name('blog.show');
        Route::post('gallery', [GalleryController::class, 'store'])->name('gallery.store');
        Route::delete('gallery/{gallery_image}', [GalleryController::class, 'destroy'])->name('gallery.destroy');

        // Content (home page sections)
        Route::prefix('content')->name('content.')->group(function () {
            Route::get('banner', [BannerContentController::class, 'edit'])->name('banner.edit');
            Route::put('banner', [BannerContentController::class, 'update'])->name('banner.update');
            Route::get('about', [AboutContentController::class, 'edit'])->name('about.edit');
            Route::put('about', [AboutContentController::class, 'update'])->name('about.update');
            Route::get('conference', [ConferenceContentController::class, 'edit'])->name('conference.edit');
            Route::put('conference', [ConferenceContentController::class, 'update'])->name('conference.update');
            Route::get('why', [WhySectionController::class, 'edit'])->name('why.edit');
            Route::put('why', [WhySectionController::class, 'update'])->name('why.update');
            Route::get('counter', [CounterContentController::class, 'edit'])->name('counter.edit');
            Route::put('counter', [CounterContentController::class, 'update'])->name('counter.update');
            Route::get('footer', [FooterContentController::class, 'edit'])->name('footer.edit');
            Route::put('footer', [FooterContentController::class, 'update'])->name('footer.update');
            Route::resource('speakers', SpeakerController::class)->except('show');
            Route::resource('sponsors', SponsorController::class)->except('show');
            Route::resource('testimonials', TestimonialController::class)->except('show');
        });
    });
});

Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');

// Registration page for event
Route::get('/register/{event}', [EventRegistrationController::class, 'create'])->name('event.register');
