<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Hotels\HotelsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Shekinah Luxury Hotel & Suites Web Routes
|
*/

// Home & Catalog
Route::get('/', [HomeController::class, 'index'])->name('welcome');
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Informational Pages
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/services', [HomeController::class, 'services'])->name('services');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

// Authentication Routes
Auth::routes();

// Hotels & Rooms
Route::get('/rooms', [HotelsController::class, 'rooms'])->name('rooms.all');
Route::get('/hotels/{id}/rooms', [HotelsController::class, 'rooms'])->name('hotel.rooms');
Route::get('/rooms/{id}', [HotelsController::class, 'roomDetails'])->name('hotel.rooms.details');
Route::post('/rooms/{id}/booking', [HotelsController::class, 'roomBooking'])->name('hotel.rooms.booking');

// Payment & Checkout
Route::get('/checkout', [HotelsController::class, 'paywithpaypal'])->name('hotel.pay');
Route::post('/checkout/process', [HotelsController::class, 'processPayment'])->name('hotel.pay.process');

// User Bookings Dashboard
Route::get('/my-bookings', [HotelsController::class, 'myBookings'])->name('user.bookings');
Route::post('/my-bookings/{id}/cancel', [HotelsController::class, 'cancelBooking'])->name('user.bookings.cancel');
