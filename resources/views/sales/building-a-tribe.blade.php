@extends('layouts.app', ['title' => 'Dare to Conquer Building a Tribe: Create the Audience That Will Last Forever', 'description' => 'Learn how to create a brand that resonates with the world and makes you feel proud to wake up every day', 'page' => 'landing'])

@section('content')
<section class="welcome crowd course">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="billboard">{{ $course->name }}</h1>
				<p>Build a Tribe of True Fans</p>
        <div class="" style="margin-top: 2rem;"><a href="#payment-form" class="btn btn-primary">Purchase Now for ${{ $course->price }}</a></div>
			</div>
		</div>
	</div>
</section>
<section class="content lesson">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2>Here&rsquo;s how to build a great brand</h2>
      </div>
      <div class="col-12 col-lg-4">
        <div class="card">
          <div class="card-body">
            <div class="circle-text">1</div>
            <h3 class="thirds">Start things right</h3>
            <p>Starting a business with a weak brand means you will have to go back to the drawing board over and over and over again. Avoid those headaches and get things started right.</p>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-4">
        <div class="card">
          <div class="card-body">
            <div class="circle-text">2</div>
            <h3 class="thirds">Gain true fans</h3>
            <p>There is a difference between building an audience and gaining True Fans that follow everything that you do and want to buy everything that you create. This is how you get word-of-mouth.</p>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-4">
        <div class="card">
          <div class="card-body">
            <div class="circle-text">3</div>
            <h3 class="thirds">Become an authority</h3>
            <p>Be recognized by others in the industry as a go to source that provides high-value without losing focus on who you are and what you want to represent in the world.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@include('partials.course.payment')
@include('partials.course.contents')
<section class="content lesson vanilla">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2>Not ready? Then check out the Brand &amp; Tribe Framework Bootcamp</h2>
      </div>
      <div class="col-12 col-lg-7">
        <p>Nobody wants to create a brand that people don't care about. You dream of creating a brand that people fall in love with and that makes them want to join your tribe.</p>
        <p>But what does it take to do that?</p>
        <p>That's what we go over in this bootcamp.</p>
      </div>
      <div class="col-12 col-lg-5">
        <div class="card">
          <div class="card-header">
            Get Started Today
          </div>
          <div class="card-body">
            <form action="https://www.getdrip.com/forms/208798461/submissions" method="post" data-drip-embedded-form="208798461">
                <div class="form-group">
                    <label for="fields[email]">Email Address</label><br />
                    <input class="form-control" type="email" name="fields[email]" value="" />
                </div>
                <div>
                  <input type="submit" name="submit" class="btn btn-primary btn-block" value="Start the Bootcamp Now" data-drip-attribute="sign-up-button" />
                </div>
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