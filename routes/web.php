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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/join', function () {
	return view('join');
});

Route::get('/guidelines', function () {
	return view('guidelines');
});

Route::get('/power-words', function() {
	return view('resource.power-words');
});

/*
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
*/

/* Courses */

Route::resource('course', 'CourseController');

/* Empire Builder */

Route::get('empire-builder', 'EpisodeController@index');

Route::get('empire-builder/welcome', function () {
	return view('empire.welcome');
});

Route::get('empire-builder/confirm', function () {
	return view('empire.confirm');
});

Route::get('empire-builder/episode/{id}', 'EpisodeController@show');

Route::resource('episode', 'EpisodeController');


Route::post('/payment', 'PaymentController@store');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('questions/category/{cat}', 'QuestionCategoryController@show');
Route::resource('questions', 'QuestionController');
Route::resource('guide', 'GuideController');
Route::resource('journey', 'JourneyController');

/* Headstart */
Route::resource('headstart', 'HeadstartController');

/* Bootcamp */
Route::get('/bootcamp', function () {
	return view('bootcamp.index');
});

Route::get('/bootcamp/finish', function () {
	return view('bootcamp.finish');
});

Route::get('/bootcamp/blogging', function () {
	return view('bootcamp.blogging.index');
});

Route::get('/bootcamp/blogging/welcome', function () {
	return view('bootcamp.blogging.welcome');
});

Route::get('/bootcamp/pinterest', function () {
	return view('bootcamp.pinterest.index');
});

Route::get('/bootcamp/pinterest/welcome', function () {
	return view('bootcamp.pinterest.welcome');
});

Route::get('/bootcamp/seo', function () {
	return view('bootcamp.seo.index');
});

Route::get('/bootcamp/seo/welcome', function () {
	return view('bootcamp.seo.welcome');
});

Route::get('/bootcamp/affiliate-marketing', function () {
	return view('bootcamp.affiliate.index');
});

Route::get('/bootcamp/affiliate-marketing/welcome', function () {
	return view('bootcamp.affiliate.welcome');
});

Route::group(['middleware' => 'auth'], function () {
	Route::get('/member/affiliate-program', function () {
		return view('member.affiliate');
	});
	Route::get('/welcome', 'WelcomeController@show');
	Route::get('service/{id}/destroy', 'ServiceController@destroy');
	Route::resource('service', 'ServiceController');
	Route::get('journey/{journey}/{stop}', 'StopController@show');
	Route::resource('stop', 'StopController');
	Route::get('member/edit', 'MemberController@edit');
	Route::resource('member', 'MemberController');
	Route::resource('password', 'PasswordController');
	Route::group(['middleware' => ['role:admin']], function () {
		Route::get('user/{user}/course/{course}', 'UserCourseController@show');
		Route::post('usersearch', 'UserSearchController@show');
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
	Route::get('course/{course}/{id}', 'LessonController@show');
	Route::get('lessoncompleted/{id}', 'LessoncompletedController@show');
	Route::get('stopcompleted/{id}', 'StopCompletedController@store');
	
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

Route::get('/articles', 'ArticleController@index');
Route::get('/{slug}', 'ArticleController@show');
