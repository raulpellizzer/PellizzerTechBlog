<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ControlPanelController;
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
Route::view('/controlpanel', 'controlpanel')->name('controlpanel')->middleware('admin');


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
    /blog route: Show all posts
*/
Route::get(
    '/blog',
    [PostController::class,'index']
    )->name('blogIndex');


/*
    /blog route: Show specific post
*/
Route::get(
    '/blog/post/{postId}',
    [PostController::class,'show']
    );


/*
    /controlpanel/manageusers: Control Panel for user management
    Available only for users with admin privileges
*/
Route::get(
    '/controlpanel/manageusers',
    [ControlPanelController::class,'index']
    )->name('manageUsers')->middleware('admin');


/*
    /controlpanel/manageusers/save: Updates data about users
    Available only for users with admin privileges
*/
Route::post(
    '/controlpanel/manageusers/save',
    [ControlPanelController::class,'update']
    )->middleware('admin');


/*
    /logout route: Logs user out of the application
*/
Route::get('/logout', [UserController::class,'logout']);


Route::get('/portfolio', function() {
    return 'Portfolio Route';
});