<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\EoRegisterController;
use App\Http\Controllers\EoLoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrderController;

// Landing Page
Route::get('/', [LandingController::class, 'index'])->name('home');

// Tentang Kami
Route::get('/tentang-kami', [AboutController::class, 'tentang'])->name('about');

// Hubungi Kami
Route::get('/hubungi-kami', [ContactController::class, 'kontak'])->name('kontak');

// Halaman Gabung EO
Route::get('/gabung-eo', function () {
    return view('auth.gabung-eo');
})->name('gabung-eo');

// Form Registrasi EO
Route::get('/register', [EoRegisterController::class, 'showForm'])->name('register-eo.form');
Route::post('/register', [EoRegisterController::class, 'submitForm'])->name('register-eo.submit');

// Form Login EO
Route::get('/login', [EoLoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [EoLoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [EoLoginController::class, 'logout'])->name('logout');

// Jelajah Event untuk Guest
Route::get('/jelajah', [EventController::class, 'index'])->name('jelajah');

// Daftar event khusus EO yang login
Route::get('/dashboard/eo', [EventController::class, 'eoIndex'])->middleware('auth')->name('dashboard.eo');

// Detail Event untuk Guest
Route::get('/event/{id}', [EventController::class, 'show'])->name('events.show');

// 🟢 Form pemesanan tiket (khusus user login)
Route::middleware(['auth'])->group(function () {
    // Form beli tiket (tahap 2)
    // Dashboard EO
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.eo');

    // Event CRUD khusus EO
    Route::get('/events', [EventController::class, 'eoIndex'])->name('events.index');
    Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('/events', [EventController::class, 'store'])->name('events.store');
    Route::get('/events/{id}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('/events/{id}', [EventController::class, 'update'])->name('events.update');
    Route::delete('/events/{id}', [EventController::class, 'destroy'])->name('events.destroy');

    // Profile edit & update
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

    Route::get('/events/{event}/buy', [OrderController::class, 'showBuyForm'])->name('order.buy');
    Route::post('/events/{event}/buy', [OrderController::class, 'store'])->name('order.store');

