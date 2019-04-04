<?php

namespace DareToConquer\Http\Controllers;

use Illuminate\Http\Request;
use DareToConquer\User;
use DareToConquer\Set;

class SetUserController extends Controller
{
    public function store(Request $request)
    {
    	$user = User::find($request->user_id);

    	$user->sets()->attach($request->set_id);

    	$set = Set::find($request->set_id);

    	return redirect('/challenge/'.$set->challenge->id.'/set/'.$request->set_id);
    }
}
