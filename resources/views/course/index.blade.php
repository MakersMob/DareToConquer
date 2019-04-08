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
<section class="courses">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<ol class="course-list">
					@foreach($courses as $course)
						<li><a href="/course/{{$course->slug}}">{{$course->name}}</a></li>
					@endforeach
				</ol>
			</div>
			
				<div class="col-12 col-lg-6 sidebar">
					@role('bronze')
						<h2 style="margin-top: 0;">Other DTC Courses</h2>
						<ol class="course-list">
							@foreach($others as $other)
								@unless(Auth::user()->courses->contains($other->id))
									<li class=""><a href="/course/{{$other->slug}}">{{$other->name}}</a></li>
								@endunless
							@endforeach
						</ol>
					@endhasrole
				</div>
		</div>
	</div>
</section>
@endsection