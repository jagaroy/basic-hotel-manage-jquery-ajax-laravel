<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes(['register'=>false]);

Route::get('/', 'HomeController@index')->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'permission'])->group(function () {

    Route::resource('users', 'UserController');

	Route::get('my_profile', 'UserController@my_profile')->name('my_profile');

	Route::resource('customers', 'CustomerController');

	Route::resource('roomtypes', 'RoomTypeController');

	Route::resource('rooms', 'RoomController');

	Route::resource('bookings', 'BookingController');

	Route::resource('expenses', 'ExpenseController');

	Route::resource('itemtypes', 'ItemTypeController');

	Route::resource('items', 'ItemController');

	Route::resource('orders', 'OrderController');

	Route::resource('payments', 'PaymentController');

	Route::resource('reminders', 'ReminderController');

});
