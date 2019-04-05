@extends('layouts.app', ['title' => 'Dare to Conquer Affiliate Marketing: The Ultimate Revenue Generating Course With Not Your Products Course', 'description' => 'Learn how to turn Affiliate Marketing into a passive income generating machine for your blog where you consistently get dollars and dollars every single day', 'page' => 'landing'])

@section('content')
<section class="welcome course">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
        <h2 class="preheader">Dare to Conquer...</h2>
				<h1 class="billboard"><span>Affiliate Marketing</span></h1>
				<h2 class="subheader course-title">The Ultimate Passively Active Revenue Generating Course</h2>
			</div>
		</div>
	</div>
</section>
<section class="content lesson">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12">
				<p>Hm, I really need to find time to work on these sales page.</p>
        <p>Ummmm...okay, this course will help you understand how to do effective affiliate marketing because it's much more than posting a link in a blog post and hoping for the best.</p>
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