<?php

namespace DareToConquer\Http\Controllers;

use Illuminate\Http\Request;
use DareToConquer\Youtube;
use DareToConquer\User;
use DareToConquer\Course;

class BaseController extends Controller
{
    public function index()
    {
    	$youtubes = Youtube::orderBy('id', 'DESC')->get();
    	$courses = Course::where('active', 1)->orderBy('order', 'ASC')->get();

    	return view('welcome', compact('youtubes', 'courses'));
    }
}
