@extends('layouts.app', ['title' => 'Empire Builder: How to Start an Online Business'])

@section('content')
<section class="welcome home">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="billboard"><strong>Empire Builder</strong><hr> How to Start and Grow a Successful Online Business</h1>
			</div>
		</div>
	</div>
</section>

<section class="content rose">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12">
				<div class="embed-responsive embed-responsive-16by9">
					<iframe width="1280" height="720" src="https://www.youtube.com/embed/WN-klUC1USw" frameborder="0" allow="encrypted-media" allowfullscreen></iframe>
				</div>
			</div>
			<div class="col-12 col-lg-6" style="margin-top: 2rem;">
				<h2>Never Miss an Update</h2>
				<div class="card">
					<div class="card-body">
						<form action="https://www.getdrip.com/forms/143053519/submissions" method="post" data-drip-embedded-form="143053519">
						    <div class="form-group">
						        <label class="form-label" for="drip-email">Email Address</label><br />
						        <input class="form-control" type="email" id="drip-email" name="fields[email]" value="" />
						    </div>
						    <div class="form-check">
						        <input type="hidden" name="fields[eu_consent]" id="drip-eu-consent-denied" value="denied" />
						        <input class="form-check-input" type="checkbox" name="fields[eu_consent]" id="drip-eu-consent" value="granted" />
						        <label class="form-check-label" for="drip-eu-consent">Just to ensure this is you and follow EU GDPR guidelines, by checking this box you consent to me sending you more kick ass emails than those other people with their buy buy buy type of stuff.</label>
						    </div>
						    <div>
						        <input type="hidden" name="fields[eu_consent_message]" value="Just to ensure this is you and follow EU GDPR guidelines, by checking this box you consent to me sending you more kick ass emails than others send.">
						    </div>
						  <div>
						    <button type="submit" class="btn btn-lg btn-primary btn-block">Receive All Empire Builder Updates</button>
						  </div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="content">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12">
				<h2>Season 1: <strong>Talented Underachiever</strong></h2>
				<h3>Episode 1</h3>
				<div class="embed-responsive embed-responsive-16by9">
					<iframe width="1280" height="720" src="https://www.youtube.com/embed/tahhxpW8hiQ" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection