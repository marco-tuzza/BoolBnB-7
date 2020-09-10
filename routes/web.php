<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/caratteristiche', function () {
    return view('caratteristiche');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/caratteristiche_auth', function () {
    return view('caratteristiche_auth');
});

Route::get('/stats', function () {
    return view('stats');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/message', 'MessageController@index')->middleware('auth');
Route::get('/dashboard', 'ApartmentController@index')->middleware('auth');
Route::resource('apartment', 'ApartmentController')->middleware('auth');
