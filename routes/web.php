<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return view('welcome');
});

//Route::get(url: '/cars', action: [CarController::class, 'index'])->name(name: 'cars.index');
//Route::get(url: '/cars/{id}', action: [CarController::class, 'show'])->name(name: 'cars.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/cars', [CarController::class, 'index'])->name('cars.index');
Route::get('/videos', [VideoController::class, 'index'])->name('videos.index');
Route::resource('/authors', AuthorController::class);
Route::resource('/books', BookController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
