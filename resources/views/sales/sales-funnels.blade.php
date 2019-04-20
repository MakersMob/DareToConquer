@extends('layouts.app', ['title' => 'Dare to Conquer Sales Funnels: The Ultimate Blog Traffic Generating Course', 'description' => 'Learn how to turn Pinterest into a traffic generating machine for your blog where you consistently get thousands of people every single day to view your content.', 'page' => 'landing'])

@section('content')
<section class="welcome course">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="billboard">{{ $course->name }}</h1>
				<p>Learn How Passive Income Is Really Made</p>
			</div>
		</div>
	</div>
</section>
<section class="content lesson">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <p>It's like you've unlocked a hidden treasure. Currently, this course is in its BETA stage meaning it's not 100% complete yet, but in its current form it's still going to help you create a sales funnel that will automate sales and help you feel good about helping your audience.</p>
        <p>Because you're ready to take action now, if you purchase this course you'll also get access to <a href="/course/product-creation"><em>6-Figure Product Creation</em></a> as well.</p>
        <p>That product sales automation lifestyle is just around the corner.</p>
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