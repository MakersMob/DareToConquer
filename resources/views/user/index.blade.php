@extends('layouts.app')

@section('content')
<section class="welcome home">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="billboard"><strong>DTC Members</strong></h1>
				<h3>{{ count($users) }} Total</h3>
			</div>
		</div>
	</div>
</section>
<section class="content smoke">
	<div class="container">
		<div class="row">
			<div class="col-12">
				{!! Form::open(['url' => 'usersearch', 'class' => '']) !!}
					<div class="form-row">
						<div class="col-9 form-group" style="margin-bottom: 0;">
							<label class="sr-only" for="search">Search Members</label>
							<input style="width: 100%" type="text" class="form-control col-12" id="search" name="search" placeholder="Search for a member">
						</div>
						<div class="col-3 form-group" style="margin-bottom: 0;">
							<button type="submit" class="btn btn-primary btn-block">Search</button>
						</div>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</section>
<section class="content">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<ul class="member-list">
					@foreach($users as $user)
						<li><a href="/user/{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }}</a></li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
</section>
@endsection