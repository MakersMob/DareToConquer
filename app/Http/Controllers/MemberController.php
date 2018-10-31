<?php

namespace DareToConquer\Http\Controllers;

use Illuminate\Http\Request;
use DareToConquer\User;
use Auth;

class MemberController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);

        return view('member.show', compact('user'));
    }

	public function edit()
    {
    	$user = Auth::user();

    	return view('member.edit', compact('user'));
    }

    public function update($id, Request $request)
    {
    	$user = User::find($id);

    	$user->first_name = $request->first_name;
    	$user->last_name = $request->last_name;
    	$user->email = $request->email;

    	$user->save();

    	return redirect('member/edit')->withSuccess('Profile successfully updated.');
    }
}
