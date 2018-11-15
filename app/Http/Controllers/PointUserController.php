<?php

namespace DareToConquer\Http\Controllers;

use Illuminate\Http\Request;
use DareToConquer\User;

class PointUserController extends Controller
{
    public function store(Request $request)
    {
    	$user = User::find($request->user_id);

    	$user->points = $user->points + $request->points;
    	$user->save();

    	return redirect('user/'.$user->id);
    }
}
