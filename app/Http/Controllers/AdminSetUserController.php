<?php

namespace DareToConquer\Http\Controllers;

use Illuminate\Http\Request;
use DareToConquer\Set;
use DareToConquer\Answer;
use DareToConquer\User;
use DareToConquer\Mail\FeedbackCompleted;
use Illuminate\Support\Facades\Mail;

class AdminSetUserController extends Controller
{
    public function show($set, $id)
    {
    	$set = Set::find($set);
    	$sets = Set::get();

    	$answers = Answer::where('user_id', $id)->orderBy('exercise_id', 'ASC')->get();

    	$user = User::find($id);

    	return view('admin.set.user', compact('set', 'sets', 'answers', 'user'));
    }

    public function store(Request $request)
    {
    	$user = User::find($request->user_id);

    	$user->sets()->updateExistingPivot($request->set_id, ['feedback' => 1]);

    	$set = Set::find($request->set_id);

    	Mail::to($user)->send(new FeedbackCompleted($user, $set));

    	return redirect('/admin/set/'.$request->set_id);
    }
}