@extends('layouts.app', ['title' => 'Business Idea Generation Bootcamp', 'description' => 'Learn how to generate business ideas that really help you make the money you want with an audience that loves you'])

@section('content')
<section class="welcome">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="billboard">The <span>Business Idea Generation</span> Bootcamp</h1>
				<h2 class="subheader">Looking for a business idea or wondering what niche you should enter? This bootcamp is for you.</h2>
			</div>
		</div>
	</div>
</section>
<section class="content lesson ">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-8">
				<p>Wanting to start an online business is very exciting, but how do you know if you have an idea that is worth pursuing?</p>
				<p>How can you make sure the niche you want to enter is right for you?</p>
				<p>That's what this bootcamp is going to help you with.</p>
				<!--<div class="">
					<script src="https://fast.wistia.com/embed/medias/uglevlcg4i.jsonp" async></script><script src="https://fast.wistia.com/assets/external/E-v1.js" async></script><div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><span class="wistia_embed wistia_async_uglevlcg4i popover=true popoverAnimateThumbnail=true videoFoam=true" style="display:inline-block;height:100%;position:relative;width:100%">&nbsp;</span></div></div>
				</div>-->
			</div>
			<div class="col-12 col-lg-4">
				<div class="card">
					<div class="card-header">
						Get Started Today
					</div>
					<div class="card-body">
						<form action="https://www.getdrip.com/forms/247570868/submissions" method="post" data-drip-embedded-form="247570868">
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