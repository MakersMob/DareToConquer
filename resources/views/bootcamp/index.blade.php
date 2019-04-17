@extends('layouts.app', ['title' => 'Welcome to Dare to Conquer Bootcamps'])

@section('content')
<section class="welcome">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-8">
				<h1 class="billboard">Free Email <strong>Business Bootcamps</strong></h1>
				<p>Jumpstart your business with a new email every day.</p>
				<p>Listed in the order that I would take them in if I was just getting started from the beginning, but feel free to go crazy and do what you want.</p>
			</div>
		</div>
	</div>
</section>
<section class="courses">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<ol class="course-list">
					<li><a href="/bootcamp/business">Online Business Bootcamp</a></li>
					<li><a href="/bootcamp/ideas">Biz Idea Generation</a></li>
					<li><a href="/bootcamp/brand">Brand &amp; Tribe Framework</a></li>
					<li><a href="/bootcamp/content">Creating Killer Content</a></li>
					<li><a href="/bootcamp/seo">Understanding SEO</a></li>
					<li><a href="/bootcamp/pinterest">Principles of Pinterest</a></li>
					<li><a href="/bootcamp/affiliate-marketing">Acquiring Affiliate Marketing Dollars</a></li>
					<li><a href="/bootcamp/product-creation">Perfect Info Product Creation</a></li>
					<li><a href="/bootcamp/sales-funnels">Storytelling Sales Funnels</a></li>
				</ol>
			</div>
		</div>
	</div>
</section>
@endsection