<?php

namespace DareToConquer\Http\Controllers;

use Illuminate\Http\Request;
use DareToConquer\Challenge;
use DareToConquer\User;
use DareToConquer\Payment;
use DareToConquer\Tier;
use Auth;
use Stripe;
use DareToConquer\Mail\ChallengePurchased;
use Illuminate\Support\Facades\Mail;

class ChallengePaymentController extends Controller
{
    public function store(Request $request)
    {
    	$tier = Tier::find($request->tier);

    	$challenge = Challenge::find($request->challenge);
    	$amount = $tier->price;
    	$description = $challenge->title.' - '.$tier->title;

        // Attempt to Charge Card
    	try {
            $charge = Stripe::charges()->create([
                'currency' => 'USD',
                'amount' => $amount, // change affiliate total as well
                'source' => $request->stripeToken,
                'description' => $description,
                'capture' => true,
                'receipt_email' => Auth::user()->email,
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
                'type' => 'challenge',
                'type_id' => $challenge->id
            ]);

            $tier->orders = $tier->order + 1;
            $tier->save();

        	$user->challenges()->attach($challenge->id);

            Mail::to($user)->send(new ChallengePurchased($user, $challenge, $tier));

            return redirect('/challenge/welcome');
        }        
    }
}