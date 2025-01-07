<?php

use App\Http\Controllers\adminPageController;
use App\Http\Controllers\eventController;
use App\Http\Controllers\landingPageController;
use App\Http\Controllers\contentLandingController;
use App\Http\Controllers\contentPaymentController;
use App\Http\Controllers\ticketController;
use Illuminate\Support\Facades\Route;

Route::get('/', [landingPageController::class, 'index'])->name('landing');

Route::get('/content', [contentLandingController::class, 'index'])->name('contentLanding');

Route::get('/content/content-payment', [contentPaymentController::class, 'index'])->name('contentPayment');

/** Admin */
Route::get('/admin', [adminPageController::class, 'index'])->name('admin');
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
