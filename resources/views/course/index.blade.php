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
<section class="content">
	<div class="container">
		<div class="row">
			@guest
				<div class="col-12 col-lg-6">
				 	<div class="card smoke sidebar">
						<div class="card-body">
							<p>All DTC Courses are text-based with some parts done in video and accessible on the website. Once you purchase a course you are given complete access to it.</p>
						</div>
					</div>
				</div>
			@endauth
			@role('gold')
				<div class="col-12 col-lg-6">
					<div class="card smoke sidebar">
						<div class="card-body">
							<p>The courses are listed in the recommended order I think you should take them at the beginning of your journey.</p>
							<p>It's important to keep in mind that you'll have to revisit courses often to fully grasp the information.</p>
							<p><strong>While I wish everything could be learned in a linear fashion, you might find yourself bouncing back and forth between courses.</strong></p>
						</div>
					</div>
				</div>
			@endhasrole
			<div class="col-12 col-lg-6">
				@role('bronze')
					<h2 style="margin-top: 0;">Your Courses</h2>
				@endhasrole
				<ul class="@role('bronze')mini-course-list @endhasrole course-list">
					@foreach($courses as $course)
						<li><a href="/course/{{$course->slug}}">{{$course->name}}</a></li>
					@endforeach
				</ul>
			</div>
			
				<div class="col-12 col-lg-6 sidebar">
					@role('bronze')
						<h2 style="margin-top: 0;">Other DTC Courses</h2>
						<ul class="mini-course-list">
							@foreach($others as $other)
								@unless(Auth::user()->courses->contains($other->id))
									<li class="text-center"><a href="/course/{{$other->slug}}">{{$other->name}}</a></li>
								@endunless
							@endforeach
						</ul>
					@endhasrole
				</div>
		</div>
	</div>
</section>
@endsection