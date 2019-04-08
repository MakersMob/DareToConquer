<?php

namespace DareToConquer\Http\Controllers;

use Illuminate\Http\Request;
use DareToConquer\Course;
use DareToConquer\Note;
use Auth;

class CourseNoteController extends Controller
{
    public function show($id)
    {
    	$course = Course::where('slug', $id)->first();

    	$notes = Note::with('course','module', 'lesson')->where('course_id', $course->id)->where('user_id', Auth::user()->id)->orderBy('lesson_id', 'ASC')->get();

    	//dd($notes);

    	return view('note.course', compact('course', 'notes'));
    }
}
