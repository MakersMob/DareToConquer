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
				<p>You don&rsquo;t want to throw a party where nobody comes. That is how most sites feel with no traffic. Pinterest is that one person who seems to be friends with everyone and can get them to show up at the drop of a dime.</p>
				<p>But to do well with Pinterest you can't just show up and do stuff. <strong>You have to have a strategy behind it all and you need to be able to adapt that strategy when Pinterest makes a change.</strong></p>
				<p>That is why <em>Dare to Conquer: Pinterest</em> is an ever-evolving course. I spend my time growing multiple sites with Pinterest and that requires testing different strategies and tools all of the time.</p>
				<p>If you're ready to get people to your party and learn what I've learned, then let's get started.</p>
			</div>
		</div>
	</div>
</section>
@include('partials.course.payment')
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