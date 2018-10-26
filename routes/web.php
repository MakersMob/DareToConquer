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

Route::get('/power-words', function() {
	return view('resource.power-words');
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

Route::get('/pinterest/special', function () {
	return view('sales.pinterest-special');
});

Route::get('empire-builder', function () {
	return view('empire.index');
});

Route::get('empire-builder/welcome', function () {
	return view('empire.welcome');
});

Route::get('empire-builder/confirm', function () {
	return view('empire.confirm');
});

Route::get('empire-builder/season1/', function () {
	return view('empire.season1.index.blade.php');
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
	Route::get('member/edit', 'MemberController@edit');
	Route::resource('member', 'MemberController');
	Route::resource('password', 'PasswordController');
	Route::group(['middleware' => ['role:admin']], function () {
		Route::resource('user', 'UserController');
		Route::get('article/create', 'ArticleController@create');
		Route::post('article', 'ArticleController@store');
		Route::get('article/{id}/edit', 'ArticleController@edit');
		Route::patch('article/{id}', 'ArticleController@update');
		Route::get('archives/create', 'ArchiveController@create');
		Route::get('archives/{id}/edit', 'ArchiveController@edit');
		Route::patch('archives/{id}', 'ArchiveController@update');
		Route::post('archives', 'ArchiveController@store');
	});	
	Route::get('courses/{course}/{id}', 'LessonController@show');
	Route::get('lessoncompleted/{id}', 'LessoncompletedController@show');
	
	Route::resource('courses', 'CourseController');
	Route::resource('modules', 'ModuleController');

	Route::resource('lessons', 'LessonController');
	Route::resource('objectives', 'ObjectiveController');
	Route::resource('worksheets', 'WorksheetController');
	Route::resource('worksheetanswers', 'WorksheetanswerController');

	Route::resource('milestones', 'MilestoneController');
	Route::post('milestonecompleted', 'MilestoneCompleteController@store');

	Route::post('taskcomplete', 'TaskCompleteController@store');
	Route::get('exchange/{id}/close', 'ExchangeController@close');
	Route::resource('exchange', 'ExchangeController');
});

Route::get('archives', 'ArchiveController@index');
Route::get('archives/{slug}', 'ArchiveController@show');

Route::get('/{slug}', 'ArticleController@show');
Route::get('/articles', 'ArticleController@index');
