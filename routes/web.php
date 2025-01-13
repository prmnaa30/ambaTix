<?php

use App\Http\Controllers\adminPageController;
use App\Http\Controllers\auth\loginController;
use App\Http\Controllers\auth\registerController;
use App\Http\Controllers\eventController;
use App\Http\Controllers\landingPageController;
use App\Http\Controllers\contentLandingController;
use App\Http\Controllers\contentPaymentController;
use App\Http\Controllers\ticketController;
use Illuminate\Support\Facades\Route;

Route::get('/', [landingPageController::class, 'index'])->name('landing');

//** Guest */
Route::middleware('guest')->group(function () {
  Route::get('/register', [registerController::class, 'showRegisterForm'])->name('register');
  Route::post('/register', [registerController::class, 'register'])->name('register');
  Route::get('/login', [loginController::class, 'showLoginForm'])->name('login');
  Route::post('/login', [loginController::class, 'login'])->name('login');
});

//** Authorized */


/** Admin */
Route::middleware(['auth', 'role:admin'])->group(function () {
  Route::get('/admin', [adminPageController::class, 'index'])->name('admin');

  // Events
  Route::resource('events', eventController::class);

  // Tickets
  Route::prefix('/events/{eventId}')->name('events.tickets.')->group(function () {
    Route::get('/tickets', [ticketController::class, 'index'])->name('index');
    Route::get('/tickets/create', [ticketController::class, 'create'])->name('create');
    Route::post('/tickets', [ticketController::class, 'store'])->name('store');
    Route::get('/tickets/{ticketId}/edit', [ticketController::class, 'edit'])->name('edit');
    Route::put('/tickets/{ticketId}', [ticketController::class, 'update'])->name('update');
    Route::delete('/tickets/{ticketId}', [ticketController::class, 'destroy'])->name('destroy');
  });

  // Transaksi
  Route::get('/transaksi', [adminPageController::class, 'transaksi'])->name('transaksi');

  // User
  Route::get('/user', [adminPageController::class, 'user'])->name('user');
});

Route::get('/logout', [loginController::class, 'logout'])->name('logout');

Route::get('/content', [contentLandingController::class, 'index'])->name('contentLanding');

Route::get('/content/content-payment', [contentPaymentController::class, 'index'])->name('contentPayment');

Route::get('/content/content-payment/payment-detail', [contentPaymentController::class, 'paymentDetail'])->name('paymentDetail');

