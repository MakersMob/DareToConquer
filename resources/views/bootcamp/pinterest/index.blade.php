@extends('layouts.app', ['title' => 'The Free 12-Day Blogging Bootcamp', 'description' => 'Want to start making money from blogging? This free bootcamp will help show you what it takes to make a living with a blog.'])

@section('content')
<section class="welcome">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="billboard"><strong>The Free 5-Day Pinterest Bootcamp</strong></h1>
				<h2 class="subheader">Take this Pinterest crash course and find out what it takes to build a successful blog before you make some silly mistakes.</h2>
			</div>
		</div>
	</div>
</section>
<section class="content smoke">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-8">
				<div class="">
					<script src="https://fast.wistia.com/embed/medias/w5512sfyc6.jsonp" async></script><script src="https://fast.wistia.com/assets/external/E-v1.js" async></script><div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><span class="wistia_embed wistia_async_w5512sfyc6 popover=true popoverAnimateThumbnail=true videoFoam=true" style="display:inline-block;height:100%;position:relative;width:100%">&nbsp;</span></div></div>
				</div>
			</div>
			<div class="col-12 col-lg-4">
				<div class="card">
					<div class="card-header">
						Get Started Today
					</div>
					<div class="card-body">
						<form action="https://www.getdrip.com/forms/350237752/submissions" method="post" data-drip-embedded-form="350237752">
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