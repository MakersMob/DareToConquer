<?php

namespace DareToConquer\Http\Controllers;

use Illuminate\Http\Request;
use DareToConquer\Course;
use DareToConquer\User;
use Auth;
use Stripe;
use DareToConquer\Mail\CoursePurchased;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    public function store(Request $request)
    {
    	switch ($request->type) {
    		case 'course':
    			$course = Course::where('slug', $request->course)->first();
                $amount = $course->price;
                $description = $course->name;
    			$role = 'bronze';
    			break;
    		case 'pinterest-special':
                $course = Course::where('slug', $request->course)->first();
                $role = 'bronze';
                $amount = 1;
                $description = $course->name;
                break;
    		default:
    			$course = Course::where('slug', $request->course)->first();
    			$role = 'copper';
    			break;
    	}

    	try {
            $charge = Stripe::charges()->create([
                'currency' => 'USD',
                'amount' => $amount, // change affiliate total as well
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

        Mail::to($user)->send(new CoursePurchased($user, $course));
        Mail::to('marybeth@makersmob.com')->send(new InviteRequired($user));

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        	$user->courses()->attach($course->id);
        	$user->assignRole('bronze');
        	return redirect('courses/'.$request->course);
        }
    }
}
