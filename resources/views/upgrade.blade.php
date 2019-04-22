@extends('layouts.app', ['title' => 'Join Dare to Conquer', 'page' => 'landing'])

@section('headScripts')
<script type="text/javascript" src="//js.stripe.com/v3/"></script>
@endsection

@section('content')
<section class="welcome">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8">
                <h1 class="billboard">You will <span>happily quit your job</span> in the next 18 months.<br><span>I dare you.</span></h1>
                <p>Learn <strong>how to build an online business</strong> that creates more freedom and happiness in your life.</p>
                <ul>
                    <li><span>End the confusion of where to start</span></li>
                    <li><span>Stop the panic of what to do next</span></li>
                    <li><span>Enjoy the freedom that your business brings</span></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="content lesson">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p>You already know the deal with DTC. Hopefully there isn't much more to say. I'm working hard to help you get to where you want to be and by upgrading that means you're ready for everything.</p>
                <p>It means you don't want to get tripped up on a specific part of the journey.</p>
                <p>It means the only force that can slow you down or hold you back is you.</p>
                <p>You look like you're ready.</p>
            </div>
        </div>
    </div>
</section>
<section class="content lesson vanilla" id="join">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="">Upgrading</h2>
            </div>
            <div class="col-12 col-lg-8">
                <p>Upgrade time means full access to all Course, Journeys and any other Resource on DTC.</p>
                <h3 class="">Pricing</h3>
                <p>Your upgrade price is the Gold Member Price MINUS however much you've spent on courses so far. The current enrollment price is ${{ env('MEMBERSHIP_PRICE') }} for a gold membership.</p>
                <p><strong>Your upgrade price is ${{ $price }}.</strong></p>
                <h3>The Guarantee</h3>
                <p>Upgrading also means you've activated the 18-month money back guarantee.</p>
                <p>This is a huge investment for anyone so I want to make sure you know that I believe in the material and more importantly I believe in you.</p>
                <p><strong>So if you purchase the full DTC Membership, you can get your money back any time with 18 months of purchase as long as you show me that you've completed the courses and tried your best to implement the material.</strong></p>
                <p>18 months. You got this.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="card" style="margin-bottom: 1rem;">
                    <div class="card-header">Upgrade to Gold Membership</div>
                    <div class="card-body">
                        {!! Form::open(['url' => 'upgrade', 'class' => 'callout', 'id' => 'payment-form']) !!}
                            @if(! empty($message))
                                <div class="alert alert-danger" role="alert">
                                  <p>{{ $message }}</p>
                                </div>
                            @endif
                                <h4 style="margin-top: 1rem;">Payment Information</h4>
                                <div class="form-group">
                                    <label for="card">Card</label>
                                    <div id="card-element">
                                    </div>
                                    <div id="card-errors"></div>
                                </div>
                            <input type="hidden" name="type" value="membership">
                            <button type="submit" class="btn btn-large btn-block btn-primary btn-lg submit-button">Upgrade to Gold for ${{ $price }}</button>
                            <p style="margin-top: 1rem;" class=""><strong>Please, only click the button once.</strong></p>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4 sidebar">
                <h3 style="margin-top: 0;">Need to Pay With PayPal?</h3>
                <p>Sure thing. Shoot an email to scrivs@daretoconquer.com letting me know you wish to pay with PayPal and include the email address I can send an invoice to. Be sure to mention you're looking to upgrade to the Full Membership along with the total price.</p>
            </div>
        </div>
    </div>
</section>
@endsection

@section('footScripts')
<script type="text/javascript">
    // This identifies your website in the createToken call below
    var stripe = Stripe('{{ env('STRIPE_KEY') }}');
    var elements = stripe.elements({
        fonts: [
            {
                family: 'Overpass',
                src: 'url(https://fonts.gstatic.com/s/opensans/v13/cJZKeOuBrn4kERxqtaUH3ZBw1xU1rKptJj_0jans920.woff2) format("woff2")',
                unicodeRange: 'U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215',
            }
        ]
    });

    var card = elements.create('card', {
        iconStyle: 'default',
        style: {
            base: {
              iconColor: '#8898AA',
              color: '#333333',
              fontSize: '20px',
              fontFamily: 'Helvetica',

              '::placeholder': {
                color: '#8898AA',
              },
            },
            invalid: {
              iconColor: '#e85746',
              color: '#e85746',
            }
        },
        classes: {
            focus: 'is-focused',
            empty: 'is-empty',
        },
    });

    card.mount('#card-element');

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

    function createToken() {
      stripe.createToken(card).then(function(result) {
        if (result.error) {
          // Inform the user if there was an error
          var errorElement = document.getElementById('card-errors');
          errorElement.textContent = result.error.message;
        } else {
          // Send the token to your server
          stripeTokenHandler(result.token);
        }
      });
    };

    // Create a token when the form is submitted.
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(e) {
      e.preventDefault();
      createToken();
    });

    card.addEventListener('change', function(event) {
      var displayError = document.getElementById('card-errors');
      if (event.error) {
        displayError.textContent = event.error.message;
      } else {
        displayError.textContent = '';
      }
    });
</script>
@endsection