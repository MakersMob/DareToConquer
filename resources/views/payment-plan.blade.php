@extends('layouts.app', ['title' => 'Join Dare to Conquer', 'page' => 'landing'])

@section('headScripts')
<script type="text/javascript" src="//js.stripe.com/v3/"></script>
@endsection

@section('content')
<section class="welcome">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="billboard"><strong>The Payment Plan</strong></h1>
                <div class="" style="margin-top: 2rem;"><a href="#join" class="btn btn-primary btn-lg">Join Today</a></div>
            </div>
        </div>
    </div>
</section>
<section class="content lesson smoke">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p>Maybe you want to join DTC but the full payment is out of your reach. Because of this I've decided to offer Payment Plans on a limited basis. You get full access to everything DTC right from the get go so there are no restrictions.</p>
                <h2>Payment Options</h2>
                <p>There are 3 options and all 3 are limited to 30 sign-ups.</p>
                <ul>
                    <li>$100 a month, 9 total payments</li>
                    <li>$150 a month, 5 total payments</li>
                    <li>$200 a month, 3 total payments</li>
                </ul>
                <p>You pay, you keep access. You don't pay, access is removed so please only consider these options if you know you can make a payment each month for the life of the payment plan.</p>
                <p><strong>Once you pay in full there will be no more payments and your lifetime access to DTC will remain.</strong></p>
            </div>
        </div>
    </div>
</section>
<section class="content lesson ice" id="join">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="card" style="margin-bottom: 1rem;">
                    <div class="card-header">Join the Party</div>
                    <div class="card-body">
                        {!! Form::open(['url' => 'subscription', 'class' => 'callout', 'id' => 'payment-form']) !!}
                            @if(! empty($message))
                                <div class="alert alert-danger" role="alert">
                                  <p>{{ $message }}</p>
                                </div>
                            @endif
                                <h4 style="margin-top: 0;">Member Information</h4>
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="first_name">First Name</label>
                                            <input class="form-control" type="text" name="first_name" id="first_name" value="@if(Auth::check()) {{ Auth::user()->first_name }} @endif" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="last_name">Last Name</label>
                                            <input class="form-control" type="text" name="last_name" id="last_name" value="@if(Auth::check()) {{ Auth::user()->last_name }} @endif" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 @if(Auth::guest()) col-lg-6 @endif">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input class="form-control" type="email" value="@if(Auth::check()) {{  Auth::user()->email }} @endif" name="email" id="email" required>
                                        </div>
                                        <small class="form-text text-muted">Email for your receipt and logging into the member's area.</small>
                                    </div>
                                    @unless(Auth::check())
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input class="form-control" type="password" required name="password" id="password">
                                        </div>
                                        <small class="form-text text-muted">Password you will use to log into the member's area.</small>
                                    </div>
                                    @endunless
                                </div>
                                <h4 style="">Payment Information</h4>
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="slug" id="exampleRadios1" value="membership-200" checked>
                                  <label class="form-check-label" for="exampleRadios1">
                                    $200 a month, total of 3 payments
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="slug" id="exampleRadios2" value="membership-150">
                                  <label class="form-check-label" for="exampleRadios2">
                                    $150 a month, total of 5 payments
                                  </label>
                                </div>
                                <div class="form-check">
                              <input class="form-check-input" type="radio" name="slug" id="exampleRadios3" value="membership-100">
                                  <label class="form-check-label" for="exampleRadios3">
                                    $100 a month, total of 9 payments
                                  </label>
                                </div>
                                <div class="form-group">
                                    <label for="card">Card</label>
                                    <div id="card-element">
                                    </div>
                                    <div id="card-errors"></div>
                                </div>
                            <input type="hidden" name="type" value="membership">
                            <button type="submit" class="btn btn-large btn-block btn-primary btn-lg submit-button">Join the Club</button>
                            <p style="margin-top: 1rem;" class="text-center"><strong>Please, only click the button once.</strong></p>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="content lesson smoke">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p>If this awesome sales page hasn't enticed you enough then why don't you go through one of my <a href="/bootcamp">free bootcamps</a> to get a better feel for how I do things.</p>
                <h2>What is inside</h2>
                <p>Currently, when you purchase a DTC Membership you will get access to both DTC and <a href="https://billionaireblogclub.com">the Billionaire Blog Club</a>.</p>
                <p>The reason why is because I'm slowly moving over all BBC assets to DTC but I'm doing it from the ground up.</p>
                <p>Between both sites you'll find courses on:</p>
                <ul>
                    <li>Pinterest</li>
                    <li>SEO</li>
                    <li>Affiliate Marketing</li>
                    <li>Content Creation</li>
                    <li>Email Marketing</li>
                </ul>
                <p>You'll also find Challenges and Journeys that will guide you through launching a blog, getting a 1,000 subscribers, and earning your first $1,000.</p>
                <p>More importantly you'll gain access to the DTC Slack Community where you can ask me personally questions when they enter your mind. You'll also get answers from 1,200+ people that live around the world and are taking the same journey as you.</p>
                <p>It is an experience like no other.</p>
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