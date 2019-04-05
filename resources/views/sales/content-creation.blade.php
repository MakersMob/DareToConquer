@extends('layouts.app', ['title' => 'Dare to Conquer Content Creation: Writing Content that People Love', 'description' => 'Stop wasting your time writing content that does not convert', 'page' => 'landing'])

@section('content')
<section class="welcome course">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
        <h2 class="preheader">Dare to Conquer...</h2>
				<h1 class="billboard"><span>Content Creation</span></h1>
				<h2 class="subheader course-title">Start Creating Content Your Audience Loves</h2>
			</div>
		</div>
	</div>
</section>
<section class="content lesson">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12">
				<p>It's hard to have any success with an online business if you don't do a good job creating content that people find valuable.</p>
        <p>The content can't just be valuable. It has to be the right stuff for the right people, but how do you make that happen?</p>
        <p>DTC: Content Creation, walks you through everything that I do to write content that attracts an audience, gets them to sign up and keeps them around.</p>
        @include('partials.payment.membership')
			</div>
		</div>
	</div>
</section>
@include('partials.course.payment')
@include('partials.course.contents')
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
        fontFamily: '"proxima-nova", "Helvetica Neue", Helvetica, sans-serif',
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