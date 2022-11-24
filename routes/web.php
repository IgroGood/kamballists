<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;


Route::middleware(['guest'])->group(function (){
    Route::get('/', [LoginController::class, 'login'])->name('login');
    Route::post('/', [AuthController::class, 'login'])->name('login');
});

Route::middleware(['auth:sanctum', 'auth'])->prefix('app')->group(function (){
    Route::get('/map', [AppController::class, 'map'])->name('app.home');
    Route::get('/logout', function() {
        session()->flush();
        return redirect()->route('index');
    })->name('app.logout');
});
