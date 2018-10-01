<?php

namespace DareToConquer\Http\Controllers;

use Illuminate\Http\Request;
use DareToConquer\Lesson;
use DareToConquer\Course;
use DareToConquer\Module;
use Auth;

class LessoncompletedController extends Controller
{
    public function show($id)
    {
    	Auth::user()->lessons()->attach($id);

    	$lesson = Lesson::find($id);
    	$module = Module::find($lesson->module_id);
    	$course = Course::find($lesson->course_id);

    	$order = $lesson->order + 1;
        if(Auth::user()->hasRole('admin')) {
            $next_lesson = Lesson::where('order', $order)->where('module_id', $module->id)->first();
            if($next_lesson) {
                return redirect('courses/'.$course->slug.'/'.$next_lesson->slug);
            }

            $ord = $module->order + 1;

            $next_module = Module::where('order', $ord)->where('course_id', $course->id)->first();

            if($next_module) {
                $lesson = Lesson::where('module_id', $next_module->id)->where('order', 1)->first();

                return redirect('courses/'.$course->slug.'/'.$lesson->slug);
            }
        }
    	
        $next_lesson = Lesson::where('order', $order)->where('module_id', $module->id)->where('active', 1)->first();

    	if($next_lesson) {
        	return redirect('courses/'.$course->slug.'/'.$next_lesson->slug);
    	}

    	$ord = $module->order + 1;

    	$next_module = Module::where('order', $ord)->where('course_id', $course->id)->first();

    	if($next_module) {
    		$lesson = Lesson::where('module_id', $next_module->id)->where('active', 1)->where('order', 1)->first();

    		return redirect('courses/'.$course->slug.'/'.$lesson->slug);
    	}

    	return redirect('/courses/'.$course->slug);
    }
}
