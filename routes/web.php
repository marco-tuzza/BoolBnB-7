<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
    return view('welcome');
});

Route::get('/search', function () {
    return view('search');
});

// Route::get('/caratteristiche', function () {
//     return view('caratteristiche');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/caratteristiche_auth', function () {
    return view('caratteristiche_auth');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/message/store', 'MessageController@store')->name('message_store');
Route::get('/caratteristiche/{id}', 'ApartmentController@show')->name('caratteristiche');
Route::get('/dashboard', 'ApartmentController@index')->middleware('auth');
Route::resource('apartment', 'ApartmentController')->middleware('auth');
Route::get('/messaggi', 'MessageController@index')->name('messaggi')->middleware('auth');
Route::get('/stats/{id}', 'StatsController@index')->middleware('auth');