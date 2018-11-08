@extends('layouts.app', ['title' => 'Join Dare to Conquer', 'page' => 'landing'])

@section('headScripts')
<script type="text/javascript" src="//js.stripe.com/v3/"></script>
@endsection

@section('content')
<section class="welcome">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="">Hello and Welcome to...</h2>
                <h1 class="billboard"><strong>Dare to Conquer</strong></h1>
                <div class="" style="margin-top: 2rem;"><a href="#join" class="btn btn-primary btn-lg">Join Today</a></div>
            </div>
        </div>
    </div>
</section>
<section class="content smoke">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div style="margin-bottom: 1rem;margin-top: 1rem;">
                    <script src="https://fast.wistia.com/embed/medias/2ri1ge9fu0.jsonp" async></script><script src="https://fast.wistia.com/assets/external/E-v1.js" async></script><div class="wistia_responsive_padding" style="padding:56.26% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><div class="wistia_embed wistia_async_2ri1ge9fu0 videoFoam=true" style="height:100%;width:100%">&nbsp;</div></div></div>
                </div>
                <h3><a href="https://billionaireblogclub.com/blog/february-2018-income-report/" target="_blank">Sample Income Report</a></h3>
            </div>
        </div>
    </div>
</section>
<section class="content ice" id="join">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="">Enrollment</h2>
            </div>
            <div class="col-12 col-lg-8">
                <p>The Billionaire Blog Club is currently not always open. This isn't me trying to be exclusive or strike fear into your heart and make you think that you're missing out.</p>
                <p>I run this place solo so it's much easier to let in groups of people where we can answer the beginner questions instead of a constant stream of people that need the same questions answered again and again.</p>
                <p>The beauty of the Billionaire Blog Club is that once you join, you join for life. You won't have to worry about paying for the next version or when a new course is added.</p>
                <p>It's the ultimate pay once, learn forever blogging resource.</p>
                <h3 class="">Pricing</h3>
                <p><strong>The current enrollment price is $447 for a lifetime membership.</strong> That's as much as a single course cost on most sites and even less than other courses!</p>
                <p>There won't ever be a sale where the price is lower so there is no point in waiting.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="card" style="margin-bottom: 1rem;">
                    <div class="card-header">Join the Party</div>
                    <div class="card-body">
                        {!! Form::open(['url' => 'payment', 'class' => 'callout', 'id' => 'payment-form']) !!}
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
                                <div class="form-group">
                                    <label for="card">Card</label>
                                    <div id="card-element">
                                    </div>
                                    <div id="card-errors"></div>
                                </div>
                            <input type="hidden" name="type" value="membership">
                            <button type="submit" class="btn btn-large btn-block btn-primary btn-lg submit-button">Join the Club for $447 (One-Time Payment)</button>
                            <p style="margin-top: 1rem;" class="text-center"><strong>Please, only click the button once.</strong></p>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4 sidebar">
                <h3>Need to Pay With PayPal?</h3>
                <p>Sure thing. Shoot an email to scrivs@daretoconquer.com letting me know you wish to pay with PayPal and include the email address I can send an invoice to.</p>
            </div>
        </div>
    </div>
</section>
-->
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