@extends('layouts.app')

@section('content')
<section class="welcome">
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
						<div class="card">
							<div class="card-body">
								<p>Ready to upgrade to the full DTC Membership giving you access to all courses and journeys? Then check out the <a href="/upgrade">upgrade page</a> to see what your upgrade price is.</p>
							</div>
						</div>
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