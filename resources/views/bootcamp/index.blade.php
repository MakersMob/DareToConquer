@extends('layouts.app', ['title' => 'Welcome to Dare to Conquer Bootcamps'])

@section('content')
<section class="welcome">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="billboard"><strong>Business Bootcamps</strong></h1>
				<h2 class="subheader">Free Email Bootcamps to Jumpstart Your Business</h2>
			</div>
		</div>
	</div>
</section>
<section class="courses">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<ul class="course-list">
					<li><a href="/bootcamp/business">Online Business Bootcamp</a></li>
					<li><a href="/bootcamp/ideas">Biz Idea Generation</a></li>
					<li><a href="/bootcamp/brand">Brand &amp; Tribe Framework</a></li>
					<li><a href="/bootcamp/content">Creating Killer Content</a></li>
					<li><a href="/bootcamp/seo">Understanding SEO</a></li>
					<li><a href="/bootcamp/pinterest">Principles of Pinterest</a></li>
					<li><a href="/bootcamp/affiliate-marketing">Acquiring Affiliate Marketing Dollars</a></li>
					<li><a href="/bootcamp/product-creation">Perfect Info Product Creation</a></li>
					<li><a href="/bootcamp/sales-funnels">Storytelling Sales Funnels</a></li>
				</ul>
			</div>
		</div>
	</div>
</section>
@endsection