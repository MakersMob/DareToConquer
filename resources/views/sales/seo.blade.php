@extends('layouts.app', ['title' => 'Dare to Conquer SEO: The Ultimate Google Mastery Course', 'description' => 'Learn how to turn Google into a traffic generating machine for your blog where you consistently get thousands of people every single day to view your content.', 'page' => 'landing'])

@section('content')
<section class="welcome course">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<h1 class="billboard">Dare to Conquer <strong>SEO</strong></h1>
				<h2 class="subheader course-title">The Ultimate Google Mastery Course</h2>
			</div>
		</div>
	</div>
</section>
<section class="content lesson">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12">
				<p>You already know how much of a pain in the ass it can be to understand SEO. Keywords, SEO tools, links, and jibjabs. Okay, jibjabs aren't an SEO thing but you wouldn't know that unless you truly understood SEO.</p>
        <p>The one question you have to ask yourself now is <strong><em>how much traffic are you missing out on because you don't understand how to get the most out of SEO?</em></strong></p>
        <p>This is why the <em>Dare to Conquer: SEO</em> course exists because you shouldn't have to ask that question. Instead, you should be able to look at new areas of growth for your business.</p>
        <p>It&rsquo;s time to get started now because search engine traffic isn&rsquo;t going wait around until you are ready.</p>
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