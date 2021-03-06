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
                <p>I want you to imagine this stupid scenario. Imagine you go off to college to become an accountant. You get accepted into the school and then you take your first semester of classes.</p>
                <p>You learn some things but you know there is a ton more stuff you need to learn so you go to register for next semester's classes but find that your school doesn't offer a second semester.</p>
                <p>Instead, they tell you to go to another school.</p>
                <p>Once you finish that school then you have to go another school!</p>
                <p>That sounds completely idiotic, right?</p>
                <p>Well, that's how the <em>how to make money</em> niche seems to work. You need to bounce around to 30 different sites to hopefully gain all of the knowledge necessary to build the successful business you want.</p>
                <p><em>Dare to Conquer</em> is the opposite of that.</p>
                <p>DTC is all about me (Scrivs) sharing every single thing that I know about building a successful business.</p>
                <p>I do this through a number of different ways and you can access all of them through this page.</p>
                <p>Lifetime access. I learn something new, I share it with you, and you grow even more.</p>
            </div>
        </div>
    </div>
</section>
@include('partials.testimonials')
<section class="content lesson" id="join">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="">Enrollment</h2>
            </div>
            <div class="col-12 col-lg-8">
                <p>The beauty of the <em>Dare to Conquer</em> is that once you join, you join for life. You won't have to worry about paying for the next version or when a new course is added.</p>
                <p>It's the ultimate pay once, learn forever online business resource.</p>
                <h3 class="">Pricing</h3>
                <p><strong>The current enrollment price is ${{ env('MEMBERSHIP_PRICE') }} for a Gold Membership</strong></p>
                <h3>The Guarantee</h3>
                <p>This is a huge investment for anyone so I want to make sure you know that I believe in the material and more importantly I believe in you.</p>
                <p><strong>So if you purchase the full DTC Membership, you can get your money back any time with 18 months of purchase as long as you show me that you've completed the courses and tried your best to implement the material.</strong></p>
                <p>18 months. You got this.</p>
                <h4>Payment Options</h4>
                <p>While there are no payment plan options for the Gold Membership, if you buy a course, it will go towards the total for your upgrade price if you want to upgrade to Gold Membership later on.</p>
                <p>Your upgrade price is the Gold Member Price MINUS however much you've spent on courses so far. The current enrollment price is ${{ env('MEMBERSHIP_PRICE') }} for a gold membership.</p>
                <p>So if you purchased <em>Hero Branding</em> ($199) and <em>Dating Pinterest</em> ($199), your upgrade price would be:</p>
                <p><code>${{ env('MEMBERSHIP_PRICE') }} - $199 - $199 = $599.</code></p>
            </div>
        </div>
    </div>
</section>
<section class="content lesson vanilla" id="join">
    <div class="container">
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
                                <h4 style="margin-top: 1rem;">Payment Information</h4>
                                <div class="form-group">
                                    <label for="card">Card</label>
                                    <div id="card-element">
                                    </div>
                                    <div id="card-errors"></div>
                                </div>
                            <input type="hidden" name="type" value="membership">
                            <button type="submit" class="btn btn-large btn-block btn-primary btn-lg submit-button">Join for Life for ${{ env('MEMBERSHIP_PRICE') }}</button>
                            <p style="margin-top: 1rem;" class=""><strong>Please, only click the button once.</strong></p>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4 sidebar">
                <h3 style="margin-top: 0;">Need to Pay With PayPal?</h3>
                <p>Sure thing. Shoot an email to scrivs@daretoconquer.com letting me know you wish to pay with PayPal and include the email address I can send an invoice to.</p>
            </div>
        </div>
    </div>
</section>
<section class="content lesson">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p>If this awesome sales page hasn't enticed you enough then why don't you go through one of my <a href="/bootcamp">free bootcamps</a> to get a better feel for how I do things.</p>
                <h2>What is inside</h2>
                <p>Currently, when you purchase a DTC Membership you will get full access to both DTC.</p>
                <p>You'll find courses on:</p>
                <ul>
                    <li>Building a Brand</li>
                    <li>Building a Tribe</li>
                    <li>Content Creation</li>
                    <li>SEO</li>
                    <li>Pinterest</li>
                    <li>Affiliate Marketing</li>
                    <li>Product Creation</li>
                    <li>Sales Funnels</li>
                </ul>
                <p>You'll also find Challenges and Journeys that will guide you through launching a blog, getting a 1,000 subscribers, and earning your first $1,000.</p>
                <p>More importantly you'll gain access to the DTC Slack Community where you can ask me personally questions when they enter your mind. You'll also get answers from 1,300+ people that live around the world and are taking the same journey as you.</p>
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