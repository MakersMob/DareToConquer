@extends('layouts.app')

@section('content')
<section class="welcome home">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="">Your Courses</h1>
			</div>
		</div>
	</div>
</section>
<section class="content rose">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<ul class="course-list">
					@foreach($courses as $course)
						<li><a href="/courses/{{$course->slug}}">{{$course->name}}</a></li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
</section>
@endsection