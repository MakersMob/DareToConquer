<?php

namespace DareToConquer\Http\Controllers;

use Illuminate\Http\Request;
use DareToConquer\User;

class UserController extends Controller
{
    public function index()
    {
    	$users = User::get();

    	foreach($users as $user)
    	{
    		$user->assignRole('gold');
    	}
    }
}
