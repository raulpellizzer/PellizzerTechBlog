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

Route::get('/contact', function() {
    return 'Contact Route';
});

Route::get('/login', function() {
    return 'Login Route';
});

Route::get('/register', function() {
    return 'Register Route';
});
