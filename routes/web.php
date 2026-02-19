<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\AboutContentController;
use App\Http\Controllers\Admin\ConferenceContentController;
use App\Http\Controllers\Admin\CounterContentController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\SpeakerController;
use App\Http\Controllers\Admin\WhySectionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Models\GalleryImage;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

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
        Route::get('/', fn () => redirect()->route('admin.dashboard'));
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::post('logout', [AdminController::class, 'logout'])->name('logout');
        Route::resource('events', EventController::class)->except('show');
        Route::resource('blogs', AdminBlogController::class)->except('show');
        Route::get('gallery', [GalleryController::class, 'index'])->name('gallery.index');
        Route::post('gallery', [GalleryController::class, 'store'])->name('gallery.store');
        Route::delete('gallery/{gallery_image}', [GalleryController::class, 'destroy'])->name('gallery.destroy');

        // Content (home page sections)
        Route::prefix('content')->name('content.')->group(function () {
            Route::get('about', [AboutContentController::class, 'edit'])->name('about.edit');
            Route::put('about', [AboutContentController::class, 'update'])->name('about.update');
            Route::get('conference', [ConferenceContentController::class, 'edit'])->name('conference.edit');
            Route::put('conference', [ConferenceContentController::class, 'update'])->name('conference.update');
            Route::get('why', [WhySectionController::class, 'edit'])->name('why.edit');
            Route::put('why', [WhySectionController::class, 'update'])->name('why.update');
            Route::get('counter', [CounterContentController::class, 'edit'])->name('counter.edit');
            Route::put('counter', [CounterContentController::class, 'update'])->name('counter.update');
            Route::resource('speakers', SpeakerController::class)->except('show');
        });
    });
});

Route::get('/gallery', function () {
    $images = GalleryImage::orderBy('created_at', 'desc')->get();
    return view('gallery', compact('images'));
})->name('gallery');
