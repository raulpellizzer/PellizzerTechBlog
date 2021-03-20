<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ControlPanelController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ContactController;
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
Route::view('/contact', 'contact')->name('contact')->middleware('auth');


/*
    Render Control Panel View
    Available only for users with admin privileges
*/
Route::view('/controlpanel', 'controlpanel')->name('controlpanel')->middleware('admin');


/*
    Render Create New Post View
    Available only for users with admin privileges
*/
Route::get(
    '/posts/new',
    [PostController::class, 'showCreateForm']
)->name('createPost')->middleware('admin');


/*
    /posts/new/create route: Create new post
    Available only for users with admin privileges
*/
Route::post(
    '/posts/new/create',
    [PostController::class, 'create']
    )->middleware('admin');


/*
    /users route: Create new user
*/
Route::post(
    '/users',
    [UserController::class, 'create']
    )->name('createUser');


/*
    /login/authenticate route: Authenticate user
*/
Route::post(
    '/login/authenticate',
    [UserController::class, 'authenticate']
    )->name('authenticateUser');


/*
    /blog route: Show all posts
*/
Route::get(
    '/blog',
    [PostController::class, 'index']
    )->name('blogIndex');


// Implement post filter here
Route::post(
    '/blog',
    [PostController::class, 'filter']
    );


/*
    /blog route: Show specific post
*/
Route::get(
    '/blog/post/{postId}',
    [PostController::class, 'show']
    );


/*
    /controlpanel/manageusers: Control Panel for user management
    Available only for users with admin privileges
*/
Route::get(
    '/controlpanel/manageusers',
    [ControlPanelController::class, 'cpUserIndex']
    )->name('manageUsers')->middleware('admin');


/*
    /controlpanel/manageposts: Control Panel for posts management
    Available only for users with admin privileges
*/
Route::get(
    '/controlpanel/manageposts',
    [ControlPanelController::class, 'cpPostsIndex']
    )->name('managePosts')->middleware('admin');


/*
    /controlpanel/manageusers/save: Updates data about users
    Available only for users with admin privileges
*/
Route::post(
    '/controlpanel/manageusers/save',
    [ControlPanelController::class, 'updateUserStatus']
    )->middleware('admin');


/*
    /controlpanel/manageposts/save: Updates data about posts
    Available only for users with admin privileges
*/
Route::post(
    '/controlpanel/manageposts/save',
    [ControlPanelController::class, 'updatePostStatus']
    )->middleware('admin');


/*
    /blog route: Edit data about specific post
*/
Route::get(
    '/controlpanel/manageposts/edit/{postId}',
    [PostController::class, 'edit']
    )->name('editPost')->middleware('admin');


/*
    /posts/update/{postId}: Updates data about posts
    Available only for users with admin privileges
*/
Route::post(
    '/posts/update/{postId}',
    [PostController::class, 'update']
    )->middleware('admin');


/*
    /pcontrolpanel/createcategorie: Shows the form for creating a new categorie
    Available only for users with admin privileges
*/
Route::get(
    '/controlpanel/createcategorie',
    [CategorieController::class, 'create']
    )->name('createCategorie')->middleware('admin');


/*
    /controlpanel/createcategorie/save: Create a new categorie
    Available only for users with admin privileges
*/
Route::post(
    '/controlpanel/createcategorie/save',
    [CategorieController::class, 'store']
    )->middleware('admin');


/*
    /contact/sendmessage: Sends the contact email
    Available only for authenticated users
*/
Route::post(
    '/contact/sendmessage',
    [ContactController::class, 'send']
    )->middleware('auth');


/*
    /logout route: Logs user out of the application
*/
Route::get('/logout', [UserController::class, 'logout']);



// REMOVE LATER
// throw new Exception("Value must be 1 or below");