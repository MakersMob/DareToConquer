@extends('layouts.app', ['title' => 'The Online Business Bootcamp', 'description' => 'How do people make money online with websites and other crazy online things.'])

@section('content')
<section class="welcome">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="billboard">The <span>Online Business</span> Bootcamp</h1>
				<h2 class="subheader">Learn how people really do make money online without scamming people and live to talk about it.</h2>
			</div>
		</div>
	</div>
</section>
<section class="content lesson rose">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-8">
				<p>You already know that people make money online but you might wondering if it's really legit and if you can do the same thing.</p>
				<p>This bootcamp is going to walk you through the ways people make money online and build successful businesses that they are proud of.</p>
				<p>If you're new to this online game then this is where you want to start.</p>
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
						<form action="https://www.getdrip.com/forms/339231962/submissions" method="post" data-drip-embedded-form="339231962">
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