<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/event', function () {
//     return view('event');
// })->middleware(['auth', 'verified'])->name('event');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/event', [EventController::class, 'index'])->name('event');

Route::post('/event/create', [EventController::class, 'save'])->name('event.create');

Route::get('/event/create', function () {
    return view('event.create');
})->middleware(['auth', 'verified'])->name('event.create');



require __DIR__.'/auth.php';
