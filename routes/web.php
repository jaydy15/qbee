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

Route::get('/', 'PagesController@index');

Route::resource('quizzes', 'QuizzesController');
Route::view('/quizzes/{{$quiz->id}}/show', 'show');
Route::resource('questions', 'QuestionsController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
