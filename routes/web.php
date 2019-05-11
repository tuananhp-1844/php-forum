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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/change-language/{lang}', 'Languages\LanguageController')->name('change-language');

Route::resource('questions', 'Questions\QuestionController');

Route::resource('tags', 'Tags\TagController')->only('index');

Route::resource('tags.questions', 'Questions\QuestionTagController')->only('index');

Route::resource('categories', 'Category\CategoryController')->only('index');

Route::resource('categories.questions', 'Questions\QuestionCategoryController')->only('index');
