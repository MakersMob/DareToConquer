<?php

namespace DareToConquer\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class MilestoneCompleteController extends Controller
{
    public function store(Request $request)
    {
    	$user = Auth::user();

    	$user->points = $user->points + 3;
    	$user->save();

    	$user->milestones()->attach($request->milestone_id);

    	return redirect('milestones/'.$request->milestone_id);
    }
}
