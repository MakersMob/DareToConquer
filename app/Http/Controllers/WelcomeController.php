<?php

namespace DareToConquer\Http\Controllers;

use Illuminate\Http\Request;
use DareToConquer\Payment;
use DareToConquer\Course;
use Auth;

class WelcomeController extends Controller
{
    public function show()
    {
    	$user = Auth::user();

    	$payment = Payment::where('user_id', $user->id)->orderBy('id', 'DESC')->first();

    	switch ($payment->type) {
    		case 'membership':
    			return view('member.welcome.membership', compact('payment'));
    			break;
    		case 'course':
    			$course = Course::find($payment->type_id);
    			return view('member.welcome.course', compact('course', 'payment'));
    			break;
    		default:
    			# code...
    			break;
    	}
    }
}
