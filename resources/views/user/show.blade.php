@extends('layouts.app', ['title' => $user->first_name.' '.$user->last_name. ' profile'])

@section('content')
<section class="welcome home">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2 class="preheader"><a href="/user"><strong>DTC Members</strong></a></h2>
				<h1 class="billboard">{{ $user->first_name }} {{ $user->last_name }}</h1>
				<h3>{{ $user->email }}</h3>
			</div>
		</div>
	</div>
</section>
<section class="content lesson">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-6">
				<h2>Courses</h2>
				<ul>
					@foreach($courses as $course)
						<li><a href="/user/{{ $user->id }}/course/{{ $course->id }}">{{ $course->name }}</a></li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
</section>
@endsection