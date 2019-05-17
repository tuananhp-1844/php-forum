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

Route::get('profile', 'Profile\ProfileController@index')->name('profile.index');

Route::get('profile/edit', 'Profile\ProfileController@edit')->name('profile.edit');

Route::put('profile/update', 'Profile\ProfileController@update')->name('profile.update');

Route::post('upload', 'Questions\UploadController')->name('upload');

Route::resource('questions.reports', 'Questions\ReportController');

Route::resource('questions.votes', 'Questions\VoteController');

Route::resource('questions.resolve', 'Questions\ResolveController')->only('index');

Route::resource('questions.progress', 'Questions\ProgressController')->only('index');

Route::resource('questions.clips', 'Questions\ClipController')->only('index');

Route::resource('polls.users', 'Users\PollController')->only('store');

Route::resource('questions.answers', 'Questions\AnswerController');
