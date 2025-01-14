<?php

use App\Http\Controllers\adminPageController;
use App\Http\Controllers\auth\loginController;
use App\Http\Controllers\auth\registerController;
use App\Http\Controllers\auth\profileController;
use App\Http\Controllers\eventCategoriesController;
use App\Http\Controllers\eventController;
use App\Http\Controllers\landingPageController;
use App\Http\Controllers\paymentController;
use App\Http\Controllers\paymentMethodController;
use App\Http\Controllers\searchController;
use App\Http\Controllers\ticketController;
use App\Http\Controllers\transactionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [landingPageController::class, 'index'])->name('landing');

Route::get('/search', [searchController::class, 'searchEvent'])->name('search');

Route::get('/event/{id}', [eventController::class, 'show'])->name('detail-event');

//** Guest */
Route::middleware('guest')->group(function () {
  Route::get('/register', [registerController::class, 'showRegisterForm'])->name('register');
  Route::post('/register', [registerController::class, 'register'])->name('register');
  Route::get('/login', [loginController::class, 'showLoginForm'])->name('login');
  Route::post('/login', [loginController::class, 'login'])->name('login');
});

//** Authorized */
Route::middleware(['auth'])->group(function (){
  Route::get('event/{id}/payment/payment-detail', [paymentController::class, 'paymentDetail'])->name('paymentDetail');
  Route::get('payment-method/{paymentMethodId}/{transactionId}', [paymentController::class, 'paymentMethod'])->name('paymentMethod');
  Route::post('payment/transaction/add', [transactionController::class, 'createTransaction'])->name('createTransaction');
  
  Route::get('event/{id}/tickets', [paymentController::class, 'ticketList'])->name('ticketList');
  Route::post('event/{id}/tickets/add', [paymentController::class, 'addTicket'])->name('addTicket');
  Route::post('event/{id}/tickets/{cartId}/remove', [paymentController::class, 'removeTicket'])->name('removeTicket');
  Route::get('event/{id}/tickets/clear', [paymentController::class, 'clearCart'])->name('clearCart');

  Route::get('/edit-profile', [profileController::class, 'editProfile'])->name('editProfile');
  Route::get('/edit-password', [profileController::class, 'editPassword'])->name('editPassword');
  Route::post('/edit-profile', [profileController::class, 'updateProfile'])->name('updateProfile');
  Route::post('/edit-password', [profileController::class, 'updatePassword'])->name('updatePassword');
});

/** Admin */
Route::middleware(['auth', 'role:admin'])->group(function () {
  Route::get('/admin', [adminPageController::class, 'index'])->name('admin');

  // Events
  Route::resource('/admin/events', eventController::class);

  // Tickets
  Route::prefix('admin/events/{eventId}')->name('events.tickets.')->group(function () {
    Route::get('/tickets', [ticketController::class, 'index'])->name('index');
    Route::get('/tickets/create', [ticketController::class, 'create'])->name('create');
    Route::post('/tickets', [ticketController::class, 'store'])->name('store');
    Route::get('/tickets/{ticketId}/edit', [ticketController::class, 'edit'])->name('edit');
    Route::put('/tickets/{ticketId}', [ticketController::class, 'update'])->name('update');
    Route::delete('/tickets/{ticketId}', [ticketController::class, 'destroy'])->name('destroy');
  });

  // Categories
  Route::resource('admin/kategori', eventCategoriesController::class);

  // Payment Method
  Route::resource('admin/payment-method', paymentMethodController::class);

  // Transaksi
  Route::get('admin/transaksi', [transactionController::class, 'adminTransactionIndex'])->name('admin.transaksi');
  Route::get('admin/transaksi/{id}', [transactionController::class, 'adminTransactionShow'])->name('transaksi.show');
  Route::put('admin/transaksi/{id}/update', [paymentController::class, 'updatePaymentStatus'])->name('transaksi.update');

  // User
  Route::get('admin/user', [adminPageController::class, 'userData'])->name('admin.user');
});

Route::get('/logout', [loginController::class, 'logout'])->name('logout');



