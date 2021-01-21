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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::get('login', function () {
    return view('users.login');
})->name('login');

Route::post('postlogin', 'LoginController@login')->name('postlogin');
Route::get('logout', 'LoginController@logout')->name('logout');

Route::group(['middleware' => ['auth', 'ceklevel:Admin']], function () { 
    Route::get('users', 'UserController@index')->name('users');
    Route::get('create_user', 'UserController@create')->name('create_user');
    Route::post('save_user', 'UserController@store')->name('save_user');
    Route::get('edit_user/{id}', 'UserController@edit')->name('edit_user');
    Route::put('update_user/{id}', 'UserController@update')->name('update_user');
    Route::delete('delete_user/{id}', 'UserController@destroy')->name('delete_user');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('tags', 'TagController@index')->name('tags');
    Route::get('create_tags', 'TagController@create')->name('create_tags');
    Route::post('save_tags', 'TagController@store')->name('save_tags');
    Route::delete('delete_tags/{id}', 'TagController@destroy')->name('delete_tags');
    Route::put('update_tags/{id}', 'TagController@update')->name('update_tags');
    Route::get('edit_tags/{id}', 'TagController@edit')->name('edit_tags');

    Route::get('post', 'PostController@index')->name('post');
    Route::get('create_post', 'PostController@create')->name('create_post');
    Route::post('save_post', 'PostController@store')->name('save_post');
    Route::get('edit_post/{id}', 'PostController@edit')->name('edit_post');
    Route::post('update_post/{id}', 'PostController@update')->name('update_post'); 
    Route::delete('delete_post/{id}', 'PostController@destroy')->name('delete_post');

    Route::get('/dashboard', 'DashboardController@index');
});

Route::get('/', 'PageController@index')->name('home');
Route::get('/post/{slug}', 'PageController@show');
Route::get('/tags/{id}', 'PageController@post_tags');