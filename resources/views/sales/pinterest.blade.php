@extends('layouts.app', ['title' => 'Dare to Conquer Pinterest: The Ultimate Blog Traffic Generating Course', 'description' => 'Learn how to turn Pinterest into a traffic generating machine for your blog where you consistently get thousands of people every single day to view your content.', 'page' => 'landing'])

@section('content')
<section class="welcome course">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<h1 class="billboard">Dare to Conquer <strong>Pinterest</strong></h1>
				<h2 class="subheader course-title">The Ultimate Blog Traffic Generating Course</h2>
			</div>
		</div>
	</div>
</section>
<section class="content lesson">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12">
				
			</div>
		</div>
	</div>
</section>
<section class="content">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12 col-lg-8">
                <h2 class="text-center" style="border-bottom: none;">Jump right in for $149</h2>
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="/payment" accept-charset="UTF-8" id="payment-form" name="stripe-form">
                            {{ csrf_field() }}
                            <div class="payment-errors"></div>
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="name">First Name</label>
                                        <input class="form-control" type="text" name="first_name" id="name" value="@if(Auth::check()) {{  Auth::user()->first_name }} @endif" data-stripe="name" required>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="name">Last Name</label>
                                        <input class="form-control" type="text" name="last_name" id="name" value="@if(Auth::check()) {{  Auth::user()->last_name }} @endif" data-stripe="name" required>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input class="form-control" type="email" value="@if(Auth::check()) {{  Auth::user()->email }} @endif" name="email" id="email" required>
                                        <small class="form-text text-muted">Email for your receipt and logging into the member's area.</small>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input class="form-control" type="password" required name="password" id="password">
                                        <small class="form-text text-muted">Password you will use to log into the member's area.</small>
                                    </div>
                                </div>
                            </div>
                            <h4 style="">Payment Information</h4>
                            <div class="form-group">
                                <div id="card-element"></div>
                                <div id="card-errors"></div>
                            </div>
                            <input type="hidden" name="type" value="course">
                            <input type="hidden" name="course" value="pinterest">
                            <button type="submit" class="btn btn-lg btn-primary btn-block" id="paymentButton">Get Started With Pinterest Today</button>
                            <p style="margin-top: 1rem;" class="text-center"><strong>Please do not submit the form more than once.</strong></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('footScripts')
<script>
    // This identifies your website in the createToken call below
    var stripe = Stripe('{{ env('STRIPE_KEY') }}');
    var elements = stripe.elements();

    var style = {
      base: {
        color: '#32325d',
        lineHeight: '18px',
        fontFamily: '"proxima-nova-condensed", "Helvetica Neue", Helvetica, sans-serif',
        fontSmoothing: 'antialiased',
        fontSize: '16px',
        '::placeholder': {
          color: '#aab7c4'
        }
      },
      invalid: {
        color: '#fa755a',
        iconColor: '#fa755a'
      }
    };

    // Create an instance of the card Element.
    var card = elements.create('card', {style: style});

    card.mount('#card-element');

    card.addEventListener('change', function(event) {
      var displayError = document.getElementById('card-errors');
      if (event.error) {
        displayError.textContent = event.error.message;
      } else {
        displayError.textContent = '';
      }
    });

    // Handle form submission.
    var form = document.querySelector("form[name='stripe-form']");
    form.addEventListener('submit', function(event) {
      event.preventDefault();
      //event.stopImmediatePropagation()

      stripe.createToken(card).then(function(result) {
        if (result.error) {
          // Inform the user if there was an error.
          var errorElement = document.getElementById('card-errors');
          errorElement.textContent = result.error.message;
        } else {
            console.log(result);
          // Send the token to your server.
          stripeTokenHandler(result.token);
        }
      });
    });

    function stripeTokenHandler(token) {
      // Insert the token ID into the form so it gets submitted to the server
      var form = document.getElementById('payment-form');
      var hiddenInput = document.createElement('input');
      hiddenInput.setAttribute('type', 'hidden');
      hiddenInput.setAttribute('name', 'stripeToken');
      hiddenInput.setAttribute('value', token.id);
      form.appendChild(hiddenInput);

      // Submit the form
      form.submit();
    }
</script>
@endsection