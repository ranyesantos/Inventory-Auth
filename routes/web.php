<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;


Route::prefix('items')->group(function(){

    Route::get('/', [ItemController::class, 'index'])->name('items-index');

    Route::get('/create', [ItemController::class, 'create'])->name('items-create')->middleware('auth');

    Route::post('/', [ItemController::class, 'store'])->name('items-store')->middleware('auth');

    Route::get('/show/{id}', [ItemController::class, 'show'])->name('items-show')->middleware('auth');

    Route::get('{id}/edit', [ItemController::class, 'edit'])->name('items-edit')->middleware('admin');

    Route::put('/{id}', [ItemController::class, 'update'])->name('items-update')->middleware('auth');

    Route::delete('/{id}', [ItemController::class, 'destroy'])->name('items-destroy')->middleware('admin');

});

Route::prefix('users')->group(function(){

    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('users-create');

    Route::post('/', [AuthenticatedSessionController::class, 'store'])->name('users-store');

    Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('users-destroy');

});

Route::post('/', [RegisteredUserController::class, 'store'])->name('newUser-create');

require __DIR__.'/auth.php';
