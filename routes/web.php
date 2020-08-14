<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('landing');
})->name('home');;

Route::get('/blog', function () {
    return view('layouts.pages.blog');
})->name('blog');;

Route::get('/contact', function () {
    return view('layouts.pages.contact');
})->name('contact');;

Route::get('/about', function () {
    return view('layouts.pages.about');
})->name('about');

Route::get('/blog-post', function () {
    return view('layouts.pages.blog-post');
})->name('blog-post');

Auth::routes();

// Route::resource('users', 'Admin\UserController', 
//     ['except' => ['show', 'create', 'store']
// ]);

/* ROUTES FOR THE STUDY ON ACCESS ROLES */

Route::get('/admin', function(){
    return 'you are admin';
})->middleware(['auth','auth.admin']);


Route::namespace('Admin')->prefix('admin')->middleware(['auth','auth.admin'])->name('admin.')->group(function(){
Route::resource('users', 'UserController', 
    ['except' => ['show', 'create', 'store']
    ]);
});

Route::get('/home', 'HomeController@index');
