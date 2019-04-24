<?php

use App\Exports\gameExport;
use Maatwebsite\Excel\Facades\Excel;

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
Route::post('/lobby/check', 'lobbyController@check');
Route::get('/home', 'HomeController@index')->name('home');
Route::post('questions/store/{id}', 'QuestionsController@store');
Route::get('/wait', 'lobbyController@lobby')->name('wait');

Route::get('/homePage', 'homePageController@index')->name('homePage');
Route::get('/lobby/index/{id}', 'lobbyController@index');
// Route::get('/lobby/{id}/joinquiz', 'lobbyController@joinquiz');
Route::put('/lobby/question', 'lobbyController@joinquiz');
Route::POST('/lobby/question', 'lobbyController@results');
Route::get('/lobby/index/{id}/start', 'lobbyController@statusupdate');
Route::get('/lobby/index/{id}/end', 'lobbyController@statusupdate0');
Route::get('/profile/join', 'HomeController@joinedquiz');
Route::get('/getExport', 'ExcelController@getExport');

Route::get('/history/{id}/download', function () {
    return Excel::download(new gameExport, 'game.xlsx');
});

Route::resource('users', 'UsersController');

Route::get('/history/{id}', 'HomeController@hostedquiz');
Route::get('/quizzes/{id}/in', 'lobbyController@updatepin');