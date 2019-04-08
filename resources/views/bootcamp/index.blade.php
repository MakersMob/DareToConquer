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
					<li><a href="/bootcamp/blogging">Blogging</a></li>
					<li><a href="/bootcamp/pinterest">Pinterest</a></li>
					<li><a href="/bootcamp/seo">SEO</a></li>
					<li><a href="/bootcamp/affiliate-marketing">Affiliate Marketing</a></li>
				</ul>
			</div>
		</div>
	</div>
</section>
@endsection