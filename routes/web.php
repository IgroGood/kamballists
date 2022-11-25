<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\AppealController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrganisationController;
use Illuminate\Support\Facades\Route;


Route::get('/js', null)->name('js');


Route::middleware(['guest'])->group(function (){
    Route::get('/', [LoginController::class, 'login'])->name('index');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/registration', [AuthController::class, 'registration'])->name('registration');
});

Route::middleware(['auth:sanctum', 'auth'])->prefix('app')->group(function (){
    Route::get('/map', [AppController::class, 'map'])->name('app.home');
    Route::get('/avatar', [AppController::class, 'avatar'])->name('app.avatar');
    Route::get('/partners', [AppController::class, 'partners'])->name('app.partners');
    Route::get('/profile', [AppController::class, 'profile'])->name('app.profile');
    Route::get('/logout', function() {
        session()->flush();
        return redirect()->route('index');
    })->name('app.logout');

    Route::get('/profile', [AppController::class, 'profile'])->name('app.profile');

    Route::prefix('appeal')->group(function() {
        Route::post('/create', [AppealController::class, 'create'])
            ->name('appeal.create');
    });

    Route::prefix('organisation')->group(function() {
        Route::get('/all', [OrganisationController::class, 'organisations'])->name('organisation.all');
        Route::get('/{id}', [OrganisationController::class, 'organisation'])->name('organisation');
        Route::post('/{id}/edit', [OrganisationController::class, 'edit'])
            ->name('organisation.edit');
        Route::post('/create', [OrganisationController::class, 'create'])
            ->name('organisation.create');
    });
});
