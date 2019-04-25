<?php

namespace DareToConquer\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DareToConquer\Payment;
use Stripe;
use DareToConquer\Mail\MembershipPurchased;
use DareToConquer\Mail\CoursePurchased;
use DareToConquer\Mail\InviteRequired;
use Illuminate\Support\Facades\Mail;

class UpgradeController extends Controller
{
    public function show()
    {
    	$user = Auth::user();
    	$payments = Payment::where('user_id', $user->id)->where('type', 'course')->get();

    	$total = 0;

    	foreach($payments as $payment) {
    		$total = $total + $payment->price;
    	}

    	$price = env('OLD_MEMBERSHIP_PRICE') - $total;

    	return view('upgrade', compact('price', 'user', 'payments'));
    }

    public function store(Request $request)
    {
    	$user = Auth::user();
    	$payments = Payment::where('user_id', $user->id)->where('type', 'course')->get();

    	$total = 0;

    	foreach($payments as $payment) {
    		$total = $total + $payment->price;
    	}

    	$amount = env('OLD_MEMBERSHIP_PRICE') - $total;

    	$description = 'DTC Membership Upgrade';
    	$type = 'membership';
    	$id = 999;

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


            $payment = Payment::create([
                'item' => $description,
                'price' => $amount,
                'user_id' => $user->id,
                'type' => $type,
                'type_id' => $id
            ]);

                $user->removeRole('bronze');
                $user->assignRole('gold');
                $user->points += 10;
                $user->save();
                Mail::to($user)->send(new MembershipPurchased($user));

                return redirect('/welcome');
    }
}
