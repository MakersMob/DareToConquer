<?php

namespace DareToConquer\Http\Controllers;

use Illuminate\Http\Request;
use DareToConquer\Course;
use DareToConquer\User;
use Auth;
use Stripe;

class PaymentController extends Controller
{
    public function store(Request $request)
    {
    	switch ($request->type) {
    		case 'course':
    			$course = Course::where('slug', $request->course)->first();
    			$role = 'bronze';
    			break;
    		
    		default:
    			$course = Course::where('slug', $request->course)->first();
    			$role = 'copper';
    			break;
    	}

    	try {
            $charge = Stripe::charges()->create([
                'currency' => 'USD',
                'amount' => $course->price, // change affiliate total as well
                'source' => $request->stripeToken,
                'description' => $course->name,
                'capture' => true,
                'receipt_email' => $request->email,
            ]);
        } catch (\Cartalyst\Stripe\Exception\CardErrorException $e) {
            $message = $e->getMessage();
            //dd($message);
            return redirect()->back()->with('message', $message);
        }

        if(Auth::user()) {
        	$user = Auth::user();

        	$user->courses()->attach($course->id);
        	$user->assignRole('bronze');

        	return redirect('courses/'.$request->course);
        }

    	$user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        	$user->courses()->attach($course->id);
        	$user->assignRole('bronze');
        	return redirect('courses/'.$request->course);
        }
    }
}
