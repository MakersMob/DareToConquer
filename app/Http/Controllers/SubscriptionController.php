<?php

namespace DareToConquer\Http\Controllers;

use Illuminate\Http\Request;
use DareToConquer\Product;
use DareToConquer\Mail\MembershipPurchased;
use DareToConquer\Mail\CoursePurchased;
use DareToConquer\Mail\InviteRequired;
use Illuminate\Support\Facades\Mail;
use DareToConquer\User;
use DareToConquer\Payment;
use Auth;

class SubscriptionController extends Controller
{
    public function store(Request $request)
    {
    	$product = Product::where('slug', $request->slug)->first();

    	$user = User::create([
    	    'first_name' => $request->first_name,
    	    'last_name' => $request->last_name,
    	    'email' => $request->email,
    	    'password' => bcrypt($request->password),
    	]);

    	$user->newSubscription($product->stripe_id, $product->stripe_id)->create($request->stripeToken, [
    		'email' => $user->email,
    	]);

    	if($product->slug == 'membership-100' || $product->slug == 'membership-150' || $product->slug == 'membership-200') {
    		$user->assignRole('gold');
    		$user->points += 10;

    		$user->save();

    		$payment = Payment::create([
    			'item' => $product->name,
    			'type' => 'membership',
    			'type_id' => 999,
    			'price' => $product->price,
    			'user_id' => $user->id
    		]);
            Mail::to('marybeth@makersmob.com')->send(new InviteRequired($user));
    		Mail::to($user)->send(new MembershipPurchased($user));

    		if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
				return redirect('/welcome');
			}
    	}
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
    	$user->updateCard($request->stripeToken);
    }

    public function destroy($id)
    {

    }
}
