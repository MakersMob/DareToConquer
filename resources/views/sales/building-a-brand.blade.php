@extends('layouts.app', ['title' => 'Dare to Conquer Building a Brand: Creating a Brand That Your Audience Loves', 'description' => 'Learn how to create a brand that resonates with the world and makes you feel proud to wake up every day', 'page' => 'landing'])

@section('content')
<section class="welcome course">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-8">
				<h1 class="billboard">The <span>Building a Brand</span> Course</h1>
				<p>Learn how to create a brand that makes more money, attracts more True Fans, and allows you to live the life that you want.</p>
        <div class="" style="margin-top: 2rem;"><a href="#payment-form" class="btn btn-primary">Purchase Now for ${{ $course->price }}</a></div>
			</div>
		</div>
	</div>
</section>
<section class="content lesson">
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-4">
        <div class="card">
          <div class="card-header">
            Start things right
          </div>
          <div class="card-body">
            <p>Starting a business with a weak brand means you will have to go back to the drawing board over and over and over again. Avoid those headaches and get things started right.</p>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-4">
        <div class="card">
          <div class="card-header">
            Gain true fans
          </div>
          <div class="card-body">
            <p>There is a difference between building an audience and gaining True Fans that follow everything that you do and want to buy everything that you create.</p>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-4">
        <div class="card">
          <div class="card-header">
            Become an authority
          </div>
          <div class="card-body">
            <p>Be recognized by others in the industry as a go to source that provides high-value without losing focus on who you are and what you want to represent in the world.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="content lesson">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <p><strong>You want to build something that people will love and make you money.</strong></p>
        <p>This course will get you started on that path.</p>
        <p>By purchasing this course you also get access to <a href="/course/building-a-tribe">Building a Tribe</a> because what is the point of building a brand if you can't build a following with it?</p>
      </div>
    </div>
  </div>
</section>
<section class="content lesson vanilla">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2>Here&rsquo;s how to build a great brand</h2>
      </div>
      <div class="col-12 col-lg-4">
        <div class="card">
          <div class="card-body">
            <div class="circle-text">1</div>
            <h3 class="thirds">Come up with an idea, lay out the plan</h3>
            <p>First, <strong>you need an idea that you know will make money</strong>. Also, understand the big picture of how online businesses make money.</p>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-4">
        <div class="card">
          <div class="card-body">
            <div class="circle-text">2</div>
            <h3 class="thirds">Come up with an idea, lay out the plan</h3>
            <p>First, <strong>you need an idea that you know will make money</strong>. Also, understand the big picture of how online businesses make money.</p>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-4">
        <div class="card">
          <div class="card-body">
            <div class="circle-text">3</div>
            <h3 class="thirds">Come up with an idea, lay out the plan</h3>
            <p>First, <strong>you need an idea that you know will make money</strong>. Also, understand the big picture of how online businesses make money.</p>
          </div>
        </div>
      </div>
      <div class="col-12">
         <div class="" style="margin-top: 2rem;"><a href="#payment-form" class="btn btn-primary">Get Started Today</a></div>
      </div>
    </div>
  </div>
</section>
<section class="content lesson">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 style="margin-top: 0;">What people are saying about the <strong>{{ $course->name }}</strong> course</h2>
      <div class="col-12 col-lg-4"></div>
      <div class="col-12 col-lg-4"></div>
      <div class="col-12 col-lg-4"></div>
    </div>
  </div>
</section>
<section class="content lesson vanilla">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 style="margin-top: 0;">Will this be you?</h2>
      </div>
      <div class="col-12 col-lg-6">
        <p>Most people just want to know how to get a website up and bringing in traffic. The problem with this type of thinking is that when you learn how to bring people to your site, you end up scrambling every single day to continue to bring more and more people to your site.</p>
        <p>Why?</p>
        <p>People don't come back.</p>
        <p><strong>Building a strong brand means understanding your audience and what they want.</strong> It means delivering the right message so they continue to come back and more important become part of your Tribe.</p>
        <p>Building a strong brand means you get to dictate how you want your business to grow on your terms.</p>
        <p>Otherwise you're going to be chasing traffic and hoping that one day you can make enough money with ads to finally pay for that second year of web hosting.</p>
        <p>You don't look like you want to be that person.</p>
        <h3>This course is for...</h3>
        <p>The person that is thinking that they are going to build a long-term business. The type of business that lasts as long as they do.</p>
        <p>The type of business that people actually admire because they love what they do, how they do it, and more importantly WHY they do it.</p>
        <p>Quick tips, tricks and hacks only last so long and take you so far.</p>
        <p><strong>A strong brand provides you with the freedom that you're wanting to achieve in the near future.</strong></p>
        <p>If you want to avoid any long periods of time where you just don't know what to do or who you are really talking to, then this course is for you.</p>
    </div>
  </div>
</section>
<section class="content lesson">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2>Get free access to the <strong>Building a Tribe</strong> Course</h2>
        <p>Because building a brand and building a tribe go hand-in-hand, when you purchase the <em>Building a Brand Course</em> you also get access to the <em>Building a Tribe Course</em> as well.</p>
        <p>Two course for the price of one.</p>
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