<?php

namespace DareToConquer\Http\Controllers;

use Illuminate\Http\Request;
use DareToConquer\Lesson;

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
        $lessons = Lesson::where('active', 1)->orderBy('updated_at', 'DESC')->limit(20)->get();
        return view('home', compact('lessons'));
    }
}
