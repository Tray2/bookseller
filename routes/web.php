<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\GuestBooks;
use App\Livewire\GuestIndex;
use App\Livewire\GuestNews;
use App\Livewire\GuestSale;
use Illuminate\Support\Facades\Route;

Route::get('/', GuestIndex::class)
    ->name('home');

Route::get('/books', GuestBooks::class)
    ->name('books');

Route::get('/news', GuestNews::class)
    ->name('news');

Route::get('sale', GuestSale::class)
    ->name('sale');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
