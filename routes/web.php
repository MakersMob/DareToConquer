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

Route::get('/', 'BaseController@index');

Route::get('/podia', function() {
	return view('podia');
});

Route::get('/sales-funnels', function () {
	return redirect('/course/sales-funnels');
});

Route::get('/framework/updates', function() {
	return view('framework.updates');
});

Route::resource('section', 'SectionController');
Route::resource('framework', 'FrameworkController');

Route::get('/join', function () {
	return view('join');
});

Route::get('/join/plan', function() {
	return redirect('/join');
});

Route::get('privacy-policy', function() {
	return view('privacy-policy');
});

/* YouTube */
Route::get('youtube', 'YoutubeController@index');

/* Email Triggers */
Route::get('the-sales-sequence', function() {
	return view('triggers.sales-sequence');
});

/* Story */

/* Track 1 */

Route::get('/origin-story', function() {
	return view('story.track1.1');
});

Route::get('/becoming-entrepreneur', function() {
	return view('story.track1.2');
});

Route::get('/understanding-business', function() {
	return view('story.track1.3');
});

Route::get('/value-money', function() {
	return view('story.track1.4');
});

Route::get('/click', function() {
	return view('story.track1.5');
});

Route::get('/next-steps', function() {
	return view('story.track1.6');
});

/* Track 2 */

Route::get('/no-traffic', function() {
	return view('story.track2.1');
});

Route::get('content-traffic', function() {
	return view('story.track2.2');
});

Route::get('pinterest-traffic', function() {
	return view('story.track2.3');
});

Route::get('pinterest-strategy', function() {
	return view('story.track2.4');
});

Route::get('seo-traffic', function() {
	return view('story.track2.5');
});

/* Track 3 */

Route::get('want-more-money', function() {
	return view('story.track3.1');
});

Route::get('creating-product', function() {
	return view('story.track3.2');
});

Route::get('membership-site', function() {
	return view('story.track3.3');
});

/* Track 4 */

Route::get('online-funnels', function() {
	return view('story.track4.1');
});

Route::get('word-of-mouth-marketing', function() {
	return view('story.track4.2');
});

Route::get('upside-down-funnel', function() {
	return view('story.track4.3');
});

Route::get('broken-funnels', function() {
	return view('story.track4.4');
});

Route::get('promise', function() {
	return view('story.track4.5');
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

Route::get('/guidelines', function () {
	return view('guidelines');
});

Route::get('/power-words', function() {
	return view('resource.power-words');
});

Route::get('manifesto', function() {
	return view('manifesto');
});

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
Route::post('/subscription', 'SubscriptionController@store');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('questions/category/{cat}', 'QuestionCategoryController@show');
Route::resource('questions', 'QuestionController');
Route::resource('guide', 'GuideController');
Route::resource('journey', 'JourneyController');

/* Headstart */
Route::resource('headstart', 'HeadstartController');

/* Bootcamps */
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

Route::get('/bootcamp/business', function () {
	return view('bootcamp.business.index');
});

Route::get('/bootcamp/business/welcome', function () {
	return view('bootcamp.business.welcome');
});

Route::get('/bootcamp/ideas', function () {
	return view('bootcamp.idea.index');
});

Route::get('/bootcamp/ideas/welcome', function () {
	return view('bootcamp.idea.welcome');
});

Route::get('/bootcamp/brand', function () {
	return view('bootcamp.brand.index');
});

Route::get('/bootcamp/brand/welcome', function () {
	return view('bootcamp.brand.welcome');
});

Route::get('/bootcamp/content', function () {
	return view('bootcamp.content.index');
});

Route::get('/bootcamp/content/welcome', function () {
	return view('bootcamp.content.welcome');
});

Route::get('/bootcamp/product-creation', function () {
	return view('bootcamp.product.index');
});

Route::get('/bootcamp/product-creation/welcome', function () {
	return view('bootcamp.product.welcome');
});

Route::get('/bootcamp/sales-funnels', function () {
	return view('bootcamp.funnels.index');
});

Route::get('/bootcamp/sales-funnels/welcome', function () {
	return view('bootcamp.funnels.welcome');
});

// Testimonial Index

Route::get('/testimonials', 'TestimonialController@index');
Route::get('/testimonials/member/{id}', 'TestimonialController@show');

// Roadmap
	Route::get('roadmap', function () {
		return view('roadmap.index');
	});

/* Stripe Webhooks */

Route::post(
    'stripe/webhook',
    '\Laravel\Cashier\Http\Controllers\WebhookController@handleWebhook'
);

Route::group(['middleware' => 'auth'], function () {


	// Upgrade
	Route::get('upgrade', 'UpgradeController@show');
	Route::post('upgrade', 'UpgradeController@store');


	Route::get('/member/affiliate-program', function () {
		return view('member.affiliate');
	});

	// Lessons
	Route::post('lessonquestion', 'LessonquestionController@store');
	Route::post('lessonanswer', 'LessonanswerController@store');

	// Bundles
	Route::resource('bundles', 'BundleController');

	// Notes
	Route::get('course/{course}/{id}/notes', 'NoteController@show');
	Route::get('course/{id}/notes', 'CourseNoteController@show');
	Route::resource('notes', 'NoteController');

	// Challenges
	Route::get('/challenge/{challenge}/set/{id}', 'SetController@show');
	Route::get('/challenge/welcome', function() {
		return view('challenge.welcome');
	});
	Route::post('/challenge/payment', 'ChallengePaymentController@store');
	Route::resource('/challenge', 'ChallengeController');

	// Sets
	Route::post('/set/completed', 'SetUserController@store');
	Route::resource('/set', 'SetController');

	Route::resource('/exercise', 'ExerciseController');

	Route::post('answer', 'AnswerController@store');

	Route::post('feedback', 'FeedbackController@store');

	// Testimonials
	Route::get('/testimonials/create', 'TestimonialController@create');
	Route::post('testimonials', 'TestimonialController@store');

	// Wins
	Route::get('/win', 'WinController@index');
	Route::post('/win', 'WinController@store');
	Route::get('/win/create', 'WinController@create');
	Route::get('/win/{id}', 'WinController@show');

	// Directory

	Route::get('/directory/niche/{id}', 'NicheController@show');
	Route::get('/directory/guest-posts', 'GuestPostController@index');
	Route::get('/directory', 'BizController@index');
	Route::get('/directory/create', 'BizController@create');
	Route::post('/directory', 'BizController@store');
	Route::get('/directory/{id}', 'BizController@show');
	Route::get('/directory/{id}/edit', 'BizController@edit');
	Route::patch('/directory/{id}', 'BizController@update');
	Route::resource('blogs', 'BizController');

	// Webinars

	Route::resource('webinars', 'WebinarController');


	Route::get('/welcome', 'WelcomeController@show');
	Route::get('service/{id}/destroy', 'ServiceController@destroy');
	Route::resource('service', 'ServiceController');
	Route::get('journey/{journey}/{stop}', 'StopController@show');
	Route::resource('stop', 'StopController');
	Route::get('member/edit', 'MemberController@edit');
	Route::resource('niche', 'NicheController');
	Route::resource('member', 'MemberController');
	Route::resource('password', 'PasswordController');
	Route::resource('newsletter', 'NewsletterController');
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

		Route::post('user/points', 'PointUserController@store');
		Route::get('youtube/create', 'YoutubeController@create');
		Route::post('youtube', 'YoutubeController@store');

		Route::post('admin/set/feedbackcompleted', 'AdminSetUserController@store');
		Route::get('admin/set/{set}/user/{id}', 'AdminSetUserController@show');
		Route::get('admin/set/{id}', 'AdminSetController@show');
	});	
	Route::get('course/{course}/pdf', 'CoursePdfController@show');
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
	Route::get('exchange/niche/{niche}', 'ExchangeNicheController@show');
	Route::get('exchange/{id}/close', 'ExchangeController@close');
	Route::resource('task', 'TaskController');
	Route::resource('exchange', 'ExchangeController');

	// Tidbits

	Route::resource('tidbit', 'TidbitController');
});

Route::get('archives', 'ArchiveController@index');
Route::get('archives/{slug}', 'ArchiveController@show');

Route::get('/articles', 'ArticleController@index');
Route::get('/{slug}', 'ArticleController@show');
