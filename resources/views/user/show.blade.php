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
			<div class="col-12 col-lg-6">
				<p>Points: {{ $user->points }}</p>
				<div class="card">
					<div class="card-body">
						{!! Form::open(['url' => 'user/points']) !!}
							<div class="form-group">
								<label for="points">Points</label>
								<input type="number" name="points" id="points" class="form-control" required>
							</div>
							<input type="hidden" name="user_id" value="{{ $user->id }}">
							<button type="submit" class="btn btn-primary">Award Points</button>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection