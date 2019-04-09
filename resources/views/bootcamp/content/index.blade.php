@extends('layouts.app', ['title' => 'Creating Online Content Bootcamp', 'description' => 'Learn how to create content that your audience loves and people share.'])

@section('content')
<section class="welcome">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="billboard">The <span>Creating Killer Online Content</span> Bootcamp</h1>
				<h2 class="subheader">Learn how to create content that your audience loves and people share.</h2>
			</div>
		</div>
	</div>
</section>
<section class="content lesson rose">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-8">
				<p>What does it take to create online content that people love and share?</p>
				<p>It's not as hard as you think but if you don't follow a structure or understand your audience's needs, you'll just be creating content that nobody cares about.</p>
				<p>Let's make sure that doesn't happen.</p>
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
						<form action="https://www.getdrip.com/forms/216105647/submissions" method="post" data-drip-embedded-form="216105647">
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