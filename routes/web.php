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
    return view('inicio');
});



Route::get('/login',function(){
    return view("login");
});

Route::get('login', function(){
    return view('auth\login');
})->name('login');

Route::get('register', function(){
    return view('auth\register');
})->name('register');

Auth::routes();





Route::get('nueva', function(){
    return view('home');
});

Route::get('/home', 'HomeController@index')->name('home');
