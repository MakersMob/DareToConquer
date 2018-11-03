@extends('layouts.app')

@section('content')
<section class="welcome home">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="billboard"><strong>Dare to Conquer...</strong></h1>
			</div>
		</div>
	</div>
</section>
<!--<section class="content smoke">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h4 style="margin-bottom: 0;"><a href="/curriculum">View the curriculum &#8594;</a></h4>
			</div>
		</div>
	</div>
</section>-->
<section class="content">
	<div class="container">
		<div class="row">
			<div class="col-12">
				@role('bronze')
					<h2>Your Courses</h2>
				@endhasrole
				<ul class="course-list">
					@foreach($courses as $course)
						<li class="text-center"><a href="/courses/{{$course->slug}}">{{$course->name}}</a></li>
					@endforeach
				</ul>
				@role('bronze')
					<h2>Other DTC Courses</h2>
					<ul class="course-list">
						@foreach($others as $other)
							@unless(Auth::user()->courses->contains($other->id))
								<li><a href="/courses/{{$other->slug}}">{{$other->name}}</a></li>
							@endunless
						@endforeach
					</ul>
				@endhasrole
			</div>
		</div>
	</div>
</section>
@endsection