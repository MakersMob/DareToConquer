<?php

namespace DareToConquer\Http\Controllers;

use Illuminate\Http\Request;
use DareToConquer\User;

class PasswordController extends Controller
{
    public function update($id, Request $request)
    {
    	$user = User::find($id);

    	$user->password = bcrypt($request->password);

    	$user->save();

    	return redirect('member/edit')->withSuccess('Password successfully updated.');
    }
}
