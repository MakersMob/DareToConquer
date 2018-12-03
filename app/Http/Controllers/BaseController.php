<?php

namespace DareToConquer\Http\Controllers;

use Illuminate\Http\Request;
use DareToConquer\Youtube;
use DareToConquer\User;

class BaseController extends Controller
{
    public function index()
    {
    	$youtubes = Youtube::orderBy('id', 'DESC')->get();

    	return view('welcome', compact('youtubes'));
    }
}
