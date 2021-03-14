<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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
Route::view('/', 'home')->name('home');


/*
    Render About View
*/
Route::view('/about', 'about');


/*
    Render Login View
*/
Route::view('/login', 'login')->name('login');


/*
    Render Register View
*/
Route::view('/register', 'register')->name('register');


/*
    Render Contact View
*/
Route::view('/contact', 'contact');


/*
    Render Control Panel View
    Available only for users with admin privileges
*/
Route::view('/controlpanel', 'controlpanel')->middleware('admin');


/*
    Render Create New Post View
    Available only for users with admin privileges
*/
Route::view('/posts/new', 'newpost')->name('createPost')->middleware('admin');


/*
    /posts/new/create route: Create new post
    Available only for users with admin privileges
*/
Route::post(
    '/posts/new/create',
    [PostController::class,'create']
    )->name('createUser')->middleware('admin');


/*
    /users route: Create new user
*/
Route::post(
    '/users',
    [UserController::class,'create']
    )->name('createUser');


/*
    /login/authenticate route: Authenticate user
*/
Route::post(
    '/login/authenticate',
    [UserController::class,'authenticate']
    )->name('authenticateUser');


/*
    /logout route: Logs user out of the application
*/
Route::get('/logout', [UserController::class,'logout']);


Route::get('/blog', function() {
    return 'Blog Route';
});


Route::get('/portfolio', function() {
    return 'Portfolio Route';
});