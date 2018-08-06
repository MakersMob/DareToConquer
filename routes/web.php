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

Route::group(['middleware' => 'auth'], function () {
	Route::get('courses/{course}/{id}', 'LessonController@show');
	Route::get('lessoncompleted/{id}', 'LessoncompletedController@show');
	
	Route::resource('courses', 'CourseController');
	Route::resource('modules', 'ModuleController');

	Route::resource('lessons', 'LessonController');
	Route::resource('objectives', 'ObjectiveController');
	Route::resource('worksheets', 'WorksheetController');
	Route::resource('worksheetanswers', 'WorksheetanswerController');
});
