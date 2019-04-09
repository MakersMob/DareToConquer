@extends('layouts.app', ['title' => 'The Info Product Creation Bootcamp', 'description' => 'What does it take to create an info product that allows you to quit your job and live your life?'])

@section('content')
<section class="welcome">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="billboard">The <span>Info Product</span> Bootcamp</h1>
				<h2 class="subheader">What does it take to create an info product that allows you to quit your job and live your life?</h2>
			</div>
		</div>
	</div>
</section>
<section class="content lesson rose">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-8">
				<p>Making your own info product is one of the best ways to make money online.</p>
				<p>Anyone can do it but that doesn't mean everyone can do it right.</p>
				<p>In this bootcamp, you'll learn what makes some info product successful while others flounder and also how you can get started on your own.</p>
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
						<form action="https://www.getdrip.com/forms/23110240/submissions" method="post" data-drip-embedded-form="23110240">
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