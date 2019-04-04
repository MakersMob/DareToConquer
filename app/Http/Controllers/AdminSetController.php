<?php

namespace DareToConquer\Http\Controllers;

use Illuminate\Http\Request;
use DareToConquer\Set;

class AdminSetController extends Controller
{
    public function show($id)
    {
    	$set = Set::find($id);
    	$count = count($set->exercises);
    	$sets = Set::get();

    	return view('admin.set.show', compact('set', 'sets', 'count'));
    }
}
