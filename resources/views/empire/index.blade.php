@extends('layouts.app', ['title' => 'Empire Builder: How to Start an Online Business'])

@section('content')
<section class="welcome home">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="billboard"><strong>Empire Builder</strong><br> How to Start and Grow a Successful Online Business</h1>
			</div>
		</div>
	</div>
</section>

<section class="content rose">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12">
				<div class="embed-responsive embed-responsive-16by9">
					<iframe width="560" height="315" src="https://www.youtube.com/embed/NcBR2wYQ_oE" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="content">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12 col-lg-6">
				<h2 style="margin-top: 0;"><strong>Never Miss an Empire Builder Update</strong></h2>
				<div class="card">
					<div class="card-body">
						<form action="https://www.getdrip.com/forms/143053519/submissions" method="post" data-drip-embedded-form="143053519">
						    <div class="form-group">
						        <label class="form-label" for="drip-email">Gimme Your Email Address...Gimme, Gimme</label><br />
						        <input class="form-control" type="email" id="drip-email" name="fields[email]" value="" />
						    </div>
						    <div class="form-check">
						        <input type="hidden" name="fields[eu_consent]" id="drip-eu-consent-denied" value="denied" />
						        <input class="form-check-input" type="checkbox" name="fields[eu_consent]" id="drip-eu-consent" value="granted" />
						        <label class="form-check-label" for="drip-eu-consent">By checking this box you understand that I am awesome and I only send awesome emails.</label>
						    </div>
						    <div>
						        <input type="hidden" name="fields[eu_consent_message]" value="Just to ensure this is you and follow EU GDPR guidelines, by checking this box you consent to me sending you more kick ass emails than others send.">
						    </div>
						  <div style="margin-top: 1rem;">
						    <button type="submit" class="btn btn-primary btn-block">Receive All Empire Builder Updates</button>
						  </div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection