@extends('layouts.app', ['title' => 'Online Business Help Guides'])

@section('content')
<section class="welcome">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="billboard">Blog &amp; Business Help Guides</h1>
			</div>
		</div>
	</div>
</section>
<section class="courses">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<ul class="course-list">
				@foreach($guides as $guide)	
					<li><a href="/guide/{{ $guide->slug }}">{{ $guide->title }}</a></li>
				@endforeach
				</ul>
			</div>
		</div>
	</div>
</section>
@endsection