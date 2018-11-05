<?php

namespace DareToConquer\Http\Controllers;

use Illuminate\Http\Request;
use DareToConquer\User;

class UserSearchController extends Controller
{
    public function show(Request $request)
    {
    	$users = User::search($request->search)->get();
    	$search = $request->search;

    	return view('user.search.show', compact('users', 'search'));
    }
}
