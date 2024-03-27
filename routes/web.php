<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('items')->group(function(){

    Route::get('/', [ItemController::class, 'index'])->name('items-index');

    Route::get('/create', [ItemController::class, 'create'])->name('items-create');

    Route::post('/', [ItemController::class, 'store'])->name('items-store');

    Route::get('/show/{id}', [ItemController::class, 'show'])->name('items-show');

    Route::get('{id}/edit', [ItemController::class, 'edit'])->name('items-edit');

    Route::put('/{id}', [ItemController::class, 'update'])->name('items-update');

    Route::delete('/{id}', [ItemController::class, 'destroy'])->name('items-destroy');
});



require __DIR__.'/auth.php';
