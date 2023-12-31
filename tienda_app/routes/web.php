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

Route::get('/', 'ContentController@getHome')->name('home');


//User Connect
Route::get('/login', 'ConnectController@getLogin')->name('login');
Route::get('/register', 'ConnectController@getRegister')->name('register');
Route::get('/recover', 'ConnectController@getRecover')->name('recover');
