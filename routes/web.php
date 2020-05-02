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
Route::view('/{any}', 'spa')->where('any', '.*');
Route::get('/', 'QuestionsController@index');


Route::get('/home', 'HomeController@index')->name('home');
Route::resource('questions', 'QuestionsController')->except('show');
Route::resource('questions.answers', 'AnswersController')->except(['create', 'show']);
Route::get('/questions/{slug}', 'QuestionsController@show')->name('questions.show');
Route::post('/answers/{answer}/accept', 'AcceptAnswerController')->name('answers.accept');

Route::post('/questions/{question}/favorite', 'FavoritesController@store')->name('questions.favorite');
Route::delete('/questions/{question}/favorite', 'FavoritesController@destroy')->name('questions.unfavorite');

Route::post('/questions/{question}/vote', 'VoteQuestionController');
Route::post('/answers/{answer}/vote', 'VoteAnswerController');