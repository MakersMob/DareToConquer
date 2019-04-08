<section class="content smoke lesson">
	<div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="" style="margin-top: 0;">Jump right in for ${{ $course->price }}</h2>
            </div>
        </div>
		<div class="row">
			<div class="col-12 col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="/payment" accept-charset="UTF-8" id="payment-form" name="stripe-form">
                            {{ csrf_field() }}
                            <div class="payment-errors"></div>
                            <div class="row">
                                @guest
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="name">First Name</label>
                                        <input class="form-control" type="text" name="first_name" id="name" value="@if(Auth::check()) {{  Auth::user()->first_name }} @endif" data-stripe="name" required>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="name">Last Name</label>
                                        <input class="form-control" type="text" name="last_name" id="name" value="@if(Auth::check()) {{  Auth::user()->last_name }} @endif" data-stripe="name" required>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input class="form-control" type="email" value="@if(Auth::check()) {{  Auth::user()->email }} @endif" name="email" id="email" required>
                                        <small class="form-text text-muted">Email for your receipt and logging into the member's area.</small>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input class="form-control" type="password" required name="password" id="password">
                                        <small class="form-text text-muted">Password you will use to log into the member's area.</small>
                                    </div>
                                </div>
                                @endguest
                            </div>
                            <h4 style="">Payment Information</h4>
                            <div class="form-group">
                                <div id="card-element"></div>
                                <div id="card-errors"></div>
                            </div>
                            <input type="hidden" name="type" value="course">
                            <input type="hidden" name="course" value="{{ $course->slug }}">
                            <button type="submit" class="btn btn-lg btn-primary btn-block" id="paymentButton">Get Started With {{ $course->title }} Today</button>
                            <p style="margin-top: 1rem;" class="text-center"><strong>Please do not submit the form more than once.</strong></p>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4 sidebar">
                <h3 style="margin-top: 0;">Get everything DTC</h3>
                <p>If you want access to all courses, journeys and other resources in DTC, then you should consider the <a href="/join">full lifetime membership</a> for $597.</p>
                <p>Pay once and never purchase any more courses ever again.</p>
            </div>
        </div>
    </div>
</section>