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

Route::get('/', function () {
    return view('auth.login');
});


Route::get('/home', 'HomeController@index')->name('home');


Auth::routes(['verify' => true, 'register' => false]);

Route::get('/home', 'HomeController@index')->middleware('verified');



Route::middleware(['auth'])->group(function () {

Route::resource('drivers', 'DriverController');

Route::resource('categories', 'CategoryController');

Route::resource('transfers', 'TransferController');

Route::resource('users', 'UserController');

});

Route::resource('forwards', 'ForwardController');