<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\IsAdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'index'])->name('page.home');
Route::get('/about-us', [PageController::class, 'about'])->name('page.about');
Route::get('/contact-us', [PageController::class, 'contact'])->name('page.contact');
Route::post('/contact-us', [PageController::class, 'contactMessage'])->name('contactMessage');

Route::get('/user/dashboard', function () {
    return view('user.dashboard');
})->middleware(['auth', 'verified'])->name('user.dashboard');

Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard')->middleware(['auth', IsAdminMiddleware::class]);

Route::get('/admin/messages', [MessageController::class, 'index'])->name('messages.index')->middleware(['auth', IsAdminMiddleware::class]);
Route::get('/admin/messages/{id}', [MessageController::class, 'show'])->name('messages.show');
Route::delete('/admin/messages/{id}', [MessageController::class, 'destroy'])->name('messages.destroy');


Route::get('/homestay/dashboard', function () {
    return view('homestay.dashboard');
})->name('homestay.dashboard')->middleware('auth');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
