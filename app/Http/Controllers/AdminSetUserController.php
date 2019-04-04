<?php

namespace DareToConquer\Http\Controllers;

use Illuminate\Http\Request;
use DareToConquer\Set;
use DareToConquer\Answer;

class AdminSetUserController extends Controller
{
    public function show($set, $id)
    {
    	$set = Set::find($set);
    	$sets = Set::get();

    	$answers = Answer::where('user_id', $id)->orderBy('exercise_id', 'ASC')->get();

    	return view('admin.set.user', compact('set', 'sets', 'answers'));
    }
}
