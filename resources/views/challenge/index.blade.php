@extends('layouts.app', ['title' => 'Join the SEO Challenge', 'page' => 'landing'])

@section('headScripts')
<script type="text/javascript" src="//js.stripe.com/v3/"></script>
@endsection

@section('content')
<section class="welcome">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="preheader">Are you ready?</h2>
                <h1 class="billboard"><strong>DTC Challenge: SEO</strong></h1>
                <div class="" style="margin-top: 2rem;"><a href="#join" class="btn btn-primary btn-lg">Join Today</a></div>
            </div>
        </div>
    </div>
</section>
<section class="content lesson smoke">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p>Would you like to get my personal feedback on how you're doing with SEO on your site?</p>
                <p>Would you like to go through a structured 28-day program that will make sure that your SEO strategy is on point?</p>
                <p>Then this SEO Challenge is for you.</p>
                <p>That was a terrible opening for a sales page but in all honesty I don't know what to say about this. Ever since I opened DTC, Members have been asking how can I provide them with some closer, 1-on-1 attention and admittedly that's pretty hard to do due to the number of members and limited amount of time.</p>
                <p>But after some time I discovered this is much easier to do if there is a specific format to follow.</p>
                <p>If both you and I understand what we are looking at together, it's possible to get more hands-on feedback from me to help step up your SEO game and so that's why I created this SEO Challenge.</p>
                <h2>How does it work?</h2>
                <p>Every couple of days, you'll log into the site and be presented with a new set of exercises. These exercises will guide you along with the steps that I would take to rank higher in Google for certain keywords.</p>
                <p>Each exercise will have a worksheet for you to fill out and the answers you provide will be read by me and I will respond to you with my feedback.</p>
                <p>Not a bot or someone in Papa New Guinea.</p>
                <p>It will be me.</p>
                <p>The Challenge is 28 days. No more, no less. What this means is that if you want to get the necessary feedback to help you along, then you need to knock things out in those 28 days.</p>
                <p>After 28 days, I'll be done with this Challenge and preparing for the next one.</p>
                <p><strong>This means you can't fill out your worksheets on day 67 and expect me to come back to them and help you out.</strong></p>
                <p>This is why the exercises will be spaced out by a number of days to give you some time in between each set.</p>
                <p>However, if you feel you can't devote time in April for this, then please don't sign up.</p>
                <p><strong>There will be absolutely no refunds unless somehow I fail on my end to take care of business.</strong></p>
                <h2>Tiers</h2>
                <p>I realize some people will want a more hands-on approach with regards to my help so I've set things up in tiers to give you the opportunity to decide what works best for you.</p>
                <h3>Tier 1</h3>
                <p>The Challenge as I've explained above. You'll walk through the exercises and get feedback from me once you fill out your worksheet. This is more than suitable for most people.</p>
                <h3>Tier 2</h3>
                <p></p>
                <h3>Tier 3</h3>
                <p>A full SEO analysis of your site.</p>
            </div>
        </div>
    </div>
</section>
<section class="content lesson ice" id="join">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="">Enrollment</h2>
            </div>
            <div class="col-12 col-lg-8">
                <p>This Challenge isn't meant to teach you the same content that is in the SEO course and for that reason if you haven't completed <em><a href="/course/{{ $challenge->lesson->course->slug }}/{{ $challenge->lesson->slug }}">{{ $challenge->lesson->name }}</a></em> then there will not be a payment form below for you to sign up.</p>
                <p>We can't afford to waste time going over the basics of SEO so please complete the course up to that lesson and come back here to sign up.</p>
                <p><strong>Registration closes as soon as all of the spots are filled or March 31st, 9pm PST. Whichever comes first.</strong></p>
            </div>
        </div>
        @if(Auth::user()->lessons->contains($challenge->lesson_id))
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="card" style="margin-bottom: 1rem;">
                    <div class="card-header">Join the Challenge</div>
                    <div class="card-body">
                        {!! Form::open(['url' => 'challenge/payment', 'class' => 'callout', 'id' => 'payment-form']) !!}
                            @if(! empty($message))
                                <div class="alert alert-danger" role="alert">
                                  <p>{{ $message }}</p>
                                </div>
                            @endif
                                <h4>Which Tier Are You Doing?</h4>
                                <?php $count = 0; ?>
                                @foreach($challenge->tiers as $tier)
                                    <?php $remaining = $tier->limit - $tier->orders; ?>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="tier" id="tierChoice{{ $count }}" value="{{ $tier->id }}" @if($count == 0) checked @endif @if($remaining == 0) disabled @endif>
                                      <label class="form-check-label" for="exampleRadios1">
                                        {{ $tier->title }} - ${{ $tier->price }} [<strong>{{ $remaining }} spots remaining</strong>]
                                      </label>
                                    </div>
                                    <?php $count++; ?>
                                @endforeach
                                <h4 style="">Payment Information</h4>
                                <div class="form-group">
                                    <label for="card">Card</label>
                                    <div id="card-element">
                                    </div>
                                    <div id="card-errors"></div>
                                </div>
                            <input type="hidden" name="challenge" value="{{ $challenge->id }}">
                            <button type="submit" class="btn btn-large btn-block btn-primary btn-lg submit-button">Sign up for the Challenge</button>
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
        @else
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <h2>Please Hold...</h2>
                <p>To participate in the Challenge you need to finish the lesson <em><a href="/course/{{ $challenge->lesson->course->slug }}/{{ $challenge->lesson->slug }}">{{ $challenge->lesson->name }}</a></em> in the {{ $challenge->lesson->course->name }} course.</p>
                <p>Once that lesson is completed, then you can come back to this page and sign up for the challenge.</p>
            </div>
        </div>
        @endif
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