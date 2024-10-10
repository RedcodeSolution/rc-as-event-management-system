<?php

use App\Http\Controllers\InvitationController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/event', function () {
    return view('event');
})->middleware(['auth', 'verified'])->name('event');

/////////////////////////////////////////////////////////////////////////////////////

Route::get('/invitations', [InvitationController::class, 'index'])->name('invitations');

Route::get('/invitations/create', function () {
    return view('invitations.create');
})->middleware(['auth', 'verified'])->name('invitations.create');

Route::post('/invitations/create', [InvitationController::class, 'create'])->name('invitations.create');

////////////////////////////////////////////////////////////////////////////////////

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
