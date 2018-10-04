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

Route::get('/planner', function () {
	return view('planner.index');
});

Route::get('/planner/thanks', function () {
	return view('planner.thanks');
});

Route::get('/mentorship/thanks', function () {
	return view('mentorship.thanks');
});

Route::get('/review/thanks', function () {
	return view('review.thanks');
});

Route::get('/pinterest', function () {
	return view('sales.pinterest');
});

Route::get('empire-builder', function () {
	return view('empire.index');
});

Route::get('how-to-start-a-business/season1', function () {
	return view('business.season1');
});

Route::post('/payment', 'PaymentController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('questions/category/{cat}', 'QuestionCategoryController@show');
Route::resource('questions', 'QuestionController');
Route::resource('guide', 'GuideController');

Route::group(['middleware' => 'auth'], function () {
	Route::get('/member', 'MemberController@index');
	Route::group(['middleware' => ['role:admin']], function () {
		Route::resource('user', 'UserController');
	});	
	Route::get('courses/{course}/{id}', 'LessonController@show');
	Route::get('lessoncompleted/{id}', 'LessoncompletedController@show');
	
	Route::resource('courses', 'CourseController');
	Route::resource('modules', 'ModuleController');

	Route::resource('lessons', 'LessonController');
	Route::resource('objectives', 'ObjectiveController');
	Route::resource('worksheets', 'WorksheetController');
	Route::resource('worksheetanswers', 'WorksheetanswerController');
});
