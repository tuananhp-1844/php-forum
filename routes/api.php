<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', 'Admin\Api\AuthController@login');
Route::post('logout', 'Admin\Api\AuthController@logout');
Route::get('profile', 'Admin\Api\AuthController@me');
Route::resource('users', 'Admin\Api\UserController')->except(['edit', 'create']);
Route::resource('tags', 'Admin\Api\TagController')->except(['edit', 'create']);
Route::resource('categories', 'Admin\Api\CategoryController')->except(['edit', 'create']);
Route::resource('questions', 'Admin\Api\QuestionController')->except(['edit', 'create']);
Route::resource('posts', 'Admin\Api\PostController')->except(['edit', 'create']);
Route::post('posts/{post}/change-status', 'Admin\Api\PostController@changeStatus');
Route::get('dashboard', 'Admin\Api\DashboardController');
