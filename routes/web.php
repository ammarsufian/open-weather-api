<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\DashboardPageController;
use Illuminate\Support\Facades\Route;


Route::get('/', [AdminAuthController::class,'checkStatus'])->name('checkStatus');
Route::post('/login', [AdminAuthController::class,'login'])->name('login');
Route::middleware('auth')->group(function(){
    Route::post('/logout', [AdminAuthController::class,'logout'])->name('logout');
    Route::get('/dashboard',DashboardPageController::class)->name('dashboard');
});



