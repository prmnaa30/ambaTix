<?php

use App\Http\Controllers\adminPageController;
use App\Http\Controllers\landingPageController;
use App\Http\Controllers\contentLandingController;
use App\Http\Controllers\contentPaymentController;
use Illuminate\Support\Facades\Route;

Route::get('/', [landingPageController::class, 'index'])->name('landing');

Route::get('/content', [contentLandingController::class, 'index'])->name('contentLanding');

Route::get('/content/content-payment', [contentPaymentController::class, 'index'])->name('contentPayment');

Route::get('/admin', [adminPageController::class, 'index'])->name('admin');

