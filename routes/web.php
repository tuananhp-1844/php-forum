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

Auth::routes(['verify' => true]);

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

Route::resource('questions.reports', 'Questions\ReportController')->only('store', 'index');

Route::resource('questions.votes', 'Questions\VoteController')->only('store', 'destroy');

Route::resource('questions.resolve', 'Questions\ResolveController')->only('index');

Route::resource('questions.progress', 'Questions\ProgressController')->only('index');

Route::resource('questions.clips', 'Questions\ClipController')->only('index');

Route::resource('polls.users', 'Users\PollController')->only('store');

Route::resource('questions.answers', 'Questions\AnswerController')->only('store');

Route::resource('answers.votes', 'Answers\VoteController')->only('store', 'destroy');

Route::resource('answers.setbest', 'Answers\SetBestController')->only('index');

Route::get('/redirect/{social}', 'Social\SocialAuthController@redirect')->name('redirect-social');

Route::get('/callback/{social}', 'Social\SocialAuthController@callback')->name('callback');

Route::resource('users', 'Users\UserController')->only('show');

Route::get('profile/clips', 'Profile\ProfileController@clip')->name('profile.clip');

Route::resource('notifications', 'Notifications\NotificationController');

Route::get('search', 'Search\SearchController@search')->name('search');
