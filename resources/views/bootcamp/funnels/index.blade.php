@extends('layouts.app', ['title' => 'Sales Funnels Bootcamp: Learn Online Sales Funnels', 'description' => 'Want to learn about online sales funnels? This free bootcamp will walk you through the ins and outs.'])

@section('content')
<section class="welcome">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="billboard">The <span>Online Sales Funnels</span> Bootcamp</h1>
				<h2 class="subheader">Understand the basics of what sales funnels are, why they work, and how to implement one yourself.</h2>
			</div>
		</div>
	</div>
</section>
<section class="content lesson rose">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-8">
				<p>When people talk about passive income or selling 24/7 what do they really mean? Odds are they are talking about sales funnels.</p>
				<p>Sales funnels can be a tricky beast to master and that's why I put together this free bootcamp to help walk you through things so you better understand if a sales funnel is right for you.</p>
				<p>One email a day. Daily learning. Sounds fun.</p>
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
						<form action="https://www.getdrip.com/forms/571511338/submissions" method="post" data-drip-embedded-form="571511338">
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