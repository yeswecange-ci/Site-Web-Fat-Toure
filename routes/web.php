<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Frontend routes
Route::middleware(['web', \App\Http\Middleware\SetLocale::class])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/locale/{locale}', [HomeController::class, 'switchLocale'])->name('locale.switch');
});
