<?php

namespace DareToConquer\Http\Controllers;

use Illuminate\Http\Request;
use DareToConquer\Set;

class AdminSetUserController extends Controller
{
    public function show($set, $id)
    {
    	$set = Set::find($id);
    	$sets = Set::get();

    	return view('admin.set.user', compact('set', 'sets'));
    }
}
