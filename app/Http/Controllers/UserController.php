<?php

namespace DareToConquer\Http\Controllers;

use Illuminate\Http\Request;
use DareToConquer\User;
use DareToConquer\Course;
use Illuminate\Support\Facades\Mail;
use DareToConquer\Mail\AccountCreated;

class UserController extends Controller
{
    public function index()
    {
    	$users = User::orderBy('id', 'DESC')->get();

    	return view('user.index', compact('users'));
    }

    public function create()
    {
    	return view('user.create');
    }

    public function store(Request $request)
    {
        $password = bcrypt('daretoconquer');

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => $password,
            'points' => 10
        ]);

        $user->assignRole('gold');
        

        Mail::to($user)->send(new AccountCreated($user));

        return redirect('user/create');
    }

    public function show($id)
    {
        $user = User::find($id);

        if($user->hasRole('gold')) {
            $courses = Course::get();
        } elseif ($user->hasRole('bronze')) {
            $courses = $user->courses;
            //dd($courses);
        } else {
            return view('user.show_copper', compact('user'));
        }

        return view('user.show', compact('user', 'courses'));
    }

    public function update($id, Request $request)
    {
        $user = User::find($id);

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;

        $user->save();

        return redirect('user/edit')->withSuccess('Profile successfully updated.');
    }
}
