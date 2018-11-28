@extends('layouts.app')

@section('content')
<section class="welcome home">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="billboard"><strong>Courses</strong></h1>
			</div>
		</div>
	</div>
</section>
<section class="content smoke">
	<div class="container">
		<div class="row">
			<div class="col-12 @role('bronze') col-lg-6 @endhasrole">
				@role('bronze')
					<h2 style="margin-top: 0;">Your Courses</h2>
				@endhasrole
				<ul class="@role('bronze')mini-course-list @endhasrole course-list">
					@foreach($courses as $course)
						<li class="text-center"><a href="/course/{{$course->slug}}">{{$course->name}}</a></li>
					@endforeach
				</ul>
			</div>
			@role('bronze')
				<div class="col-12 col-lg-6">
					<h2 style="margin-top: 0;">Other DTC Courses</h2>
					<ul class="mini-course-list">
						@foreach($others as $other)
							@unless(Auth::user()->courses->contains($other->id))
								<li class="text-center"><a href="/course/{{$other->slug}}">{{$other->name}}</a></li>
							@endunless
						@endforeach
					</ul>
				</div>
			@endhasrole
		</div>
	</div>
</section>
@endsection