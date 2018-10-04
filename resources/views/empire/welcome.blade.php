@extends('layouts.app', ['title' => 'Empire Builder: How to Start an Online Business'])

@section('content')
<section class="welcome home">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="">How to Start and Grow a Successful Online Business</h1>
			</div>
		</div>
	</div>
</section>

<section class="content rose">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<form action="https://www.getdrip.com/forms/143053519/submissions" method="post" data-drip-embedded-form="143053519">
				  <div data-drip-attribute="description"><br>
				Schedule</div>
				    <div class="form-group">
				        <label class="form-label" for="drip-email">Email Address</label><br />
				        <input class="form-control" type="email" id="drip-email" name="fields[email]" value="" />
				    </div>
				    <div class="form-group">
				        <input type="hidden" name="fields[eu_consent]" id="drip-eu-consent-denied" value="denied" />
				        <input class="form-control" type="checkbox" name="fields[eu_consent]" id="drip-eu-consent" value="granted" />
				        <label for="drip-eu-consent">Just to ensure this is you and follow EU GDPR guidelines, by checking this box you consent to me sending you more kick ass emails than others send.</label>
				    </div>
				    <div>
				        <input type="hidden" name="fields[eu_consent_message]" value="Just to ensure this is you and follow EU GDPR guidelines, by checking this box you consent to me sending you more kick ass emails than others send.">
				    </div>
				  <div>
				    <button type="submit" class="btn btn-lg btn-primary">Receive All Empire Builder Updates</button>
				  </div>
				</form>
			</div>
		</div>
	</div>
</section>
@endsection