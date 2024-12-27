<?php

use App\Http\Controllers\adminPageController;
use App\Http\Controllers\landingPageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [landingPageController::class, 'index'])->name('landing');

Route::get('/admin', [adminPageController::class, 'index'])->name('admin');