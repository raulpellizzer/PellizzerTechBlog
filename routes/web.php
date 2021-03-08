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


/*
    Render Home View
*/
Route::view('/', 'home');


/*
    Render About View
*/
Route::view('/about', 'about');


/*
    Render Login View
*/
Route::view('/login', 'login');


/*
    Render Register View
*/
Route::view('/register', 'register');


/*
    Render Contact View
*/
Route::view('/contact', 'contact');


Route::get('/blog', function() {
    return 'Blog Route';
});


Route::get('/portfolio', function() {
    return 'Portfolio Route';
});