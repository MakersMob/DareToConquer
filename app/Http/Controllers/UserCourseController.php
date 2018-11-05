<?php

namespace DareToConquer\Http\Controllers;

use Illuminate\Http\Request;
use DareToConquer\User;
use DareToConquer\Course;
use DareToConquer\Module;

class UserCourseController extends Controller
{
    public function show($user, $course)
    {
    	$user = User::find($user);
    	$course = Course::find($course);

    	$modules = Module::where('course_id', $course->id)->where('active', 1)->with(['less' => function ($query) {
            $query->where('active', '1');
            $query->orderBy('order', 'ASC');
        }])->orderBy('order', 'ASC')->get();

    	return view('user.course.show', compact('user', 'course', 'modules'));
    }
}
