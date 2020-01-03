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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Question 
Route::resource('questions','QuestionController')->except('show');
Route::resource('questions.answers','AnswerController')->except(['index','create','show']);
Route::get('questions/{slug}','QuestionController@show')->name('questions.show');

// Route::post('questions/{question}/answers','AnswerController@store')->name('answers.store');



