@extends('layouts.app')

@section('content')
<section class="welcome">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1>Courses</h1>
			</div>
		</div>
	</div>
</section>
<section class="content">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<ul>
					@foreach($courses as $course)
						<li><a href="/courses/{{$course->slug}}">{{$course->name}}</a></li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
</section>
@endsection