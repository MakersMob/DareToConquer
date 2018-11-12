<?php

namespace DareToConquer\Http\Controllers;

use Illuminate\Http\Request;
use DareToConquer\Lesson;
use DareToConquer\Stop;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->hasRole('gold')) {
            $lessons = Lesson::where('active', 1)->orderBy('updated_at', 'DESC')->paginate(10);

            $stops = Stop::where('active', 1)->orderBy('updated_at', 'DESC')->paginate(5);
            
            return view('home', compact('lessons', 'stops'));
        }
        
        $courses = Auth::user()->courses()->pluck('course_id')->toArray();

        $lessons = Lesson::where('active', 1)->where('course_id', $courses)->orderBy('updated_at', 'DESC')->paginate(20);

        $journeys = Auth::user()->journeys()->pluck('journey_id')->toArray();

        $stops = Stop::where('active', 1)->where('journey_id', $journeys)->orderBy('updated_at', 'DESC')->paginate(5);

        return view('home', compact('lessons', 'stops'));
    }
}
