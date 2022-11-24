<?php
use App\Http\Controllers\ExecutiveController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PageController::class, 'login'])->name('index');
Route::get('/map', [PageController::class, 'map'])->name('map');