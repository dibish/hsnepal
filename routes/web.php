<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Homestay\HomestayController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\IsAdminMiddleware;
use App\Http\Middleware\IsHomestayOwnerMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'index'])->name('page.home');
Route::get('/about-us', [PageController::class, 'about'])->name('page.about');
Route::get('/contact-us', [PageController::class, 'contact'])->name('page.contact');
Route::post('/contact-us', [PageController::class, 'contactMessage'])->name('contactMessage');

Route::get('/user/dashboard', function () {
    return view('user.dashboard');
})->middleware(['auth', 'verified'])->name('user.dashboard');

//Admin routes
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard')->middleware(['auth', IsAdminMiddleware::class]);
Route::get('/admin/messages', [MessageController::class, 'index'])->name('messages.index')->middleware(['auth', IsAdminMiddleware::class]);
Route::get('/admin/messages/{id}', [MessageController::class, 'show'])->name('messages.show')->middleware(['auth', IsAdminMiddleware::class]);
Route::delete('/admin/messages/{id}', [MessageController::class, 'destroy'])->name('messages.destroy')->middleware(['auth', IsAdminMiddleware::class]);
Route::get('/admin/all-homestay', [AdminController::class, 'homestay'])->name('admin.homestay.show')->middleware(['auth', IsAdminMiddleware::class]);
Route::get('/admin/homestay/{id}/edit', [AdminController::class, 'editHomestay'])->name('admin.homestay.edit')->middleware(['auth', IsAdminMiddleware::class]);
Route::put('/admin/homestay/{id}', [AdminController::class, 'updateHomestay'])->name('admin.homestay.update')->middleware(['auth', IsAdminMiddleware::class]);


// Homestay routes
Route::get('/homestay/dashboard', [HomestayController::class, 'index'])->name('homestay.dashboard')->middleware('auth', IsHomestayOwnerMiddleware::class);
Route::get('/homestay/inquiry', [HomestayController::class, 'inquiry'])->name('homestay.inquiry')->middleware('auth', IsHomestayOwnerMiddleware::class);
Route::get('/homestay/create', [HomestayController::class, 'create'])->name('homestay.create')->middleware('auth', IsHomestayOwnerMiddleware::class);
Route::post('/homestay/create', [HomestayController::class, 'store'])->name('homestay.store')->middleware('auth', IsHomestayOwnerMiddleware::class);
Route::get('/homestay/{id}/edit', [HomestayController::class, 'edit'])->name('homestay.edit')->middleware('auth', IsHomestayOwnerMiddleware::class);
Route::put('/homestay/{id}', [HomestayController::class, 'update'])->name('homestay.update')->middleware('auth', IsHomestayOwnerMiddleware::class);
Route::get('/homestay/{id}', [HomestayController::class, 'show'])->name('homestay.show');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
