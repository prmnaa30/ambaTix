<?php

use App\Http\Controllers\adminPageController;
use App\Http\Controllers\eventController;
use App\Http\Controllers\landingPageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [landingPageController::class, 'index'])->name('landing');

/** Admin */
Route::get('/admin', [adminPageController::class, 'index'])->name('admin');
Route::resource('/admin/events', eventController::class);