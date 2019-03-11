<?php

namespace DareToConquer\Http\Controllers;

use Illuminate\Http\Request;
use DareToConquer\Course;
use DareToConquer\User;
use DareToConquer\Payment;
use Auth;
use Stripe;
use DareToConquer\Mail\MembershipPurchased;
use DareToConquer\Mail\CoursePurchased;
use DareToConquer\Mail\InviteRequired;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    public function store(Request $request)
    {
    	switch ($request->type) {
    		case 'course':
    			$course = Course::where('slug', $request->course)->first();
                $id = $course->id;
                $type = 'course';
                $amount = $course->price;
                $description = $course->name;
    			$role = 'bronze';
    			break;
    		case 'pinterest-special':
                $course = Course::where('slug', $request->course)->first();
                $id = $course->id;
                $role = 'bronze';
                $type = 'course';
                $amount = 1;
                $description = $course->name;
                break;
            case 'membership':
                $amount = 597;
                $id = 999;
                $type = 'membership';
                $description = 'DTC Membership';
                break;
    		default:
    			$course = Course::where('slug', $request->course)->first();
    			$role = 'copper';
                $id = 0;
                $type = 'error';
                $description = 'Emptiness';
    			break;
    	}

        // Attempt to Charge Card
    	try {
            $charge = Stripe::charges()->create([
                'currency' => 'USD',
                'amount' => $amount, // change affiliate total as well
                'source' => $request->stripeToken,
                'description' => $description,
                'capture' => true,
                'receipt_email' => $request->email,
            ]);
        } catch (\Cartalyst\Stripe\Exception\CardErrorException $e) {
            $message = $e->getMessage();
            //dd($message);
            return redirect()->back()->with('message', $message);
        }

        // Assign purchase and send email
        if(Auth::user()) {
        	$user = Auth::user();

            $payment = Payment::create([
                'item' => $description,
                'price' => $amount,
                'user_id' => $user->id,
                'type' => $type,
                'type_id' => $id
            ]);

            if($request->type == 'membership') {
                $user->removeRole('bronze');
                $user->assignRole('gold');
                $user->points += 10;
                $user->save();
                Mail::to($user)->send(new MembershipPurchased($user));

                return redirect('/welcome');
            }

        	$user->courses()->attach($course->id);
        	$user->assignRole('bronze');

            Mail::to($user)->send(new CoursePurchased($user, $course));

            return redirect('/welcome');
        } else {
            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);

            $payment = Payment::create([
                'item' => $description,
                'price' => $amount,
                'user_id' => $user->id,
                'type' => $type,
                'type_id' => $id
            ]);

            if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

                Mail::to('marybeth@makersmob.com')->send(new InviteRequired($user));

                if($request->type == 'membership') {
                    $user->assignRole('gold');
                    $user->points += 10;
                    $user->save();
                    Mail::to($user)->send(new MembershipPurchased($user));

                    return redirect('/welcome');
                }

                Mail::to($user)->send(new CoursePurchased($user, $course));
                $user->courses()->attach($course->id);
                $user->assignRole('bronze');

                return redirect('/welcome');
            }
        }        
    }
}