@extends('layouts.app', ['title' => 'Win by '.$win->user->first_name])

@section('content')
<section class="welcome exchange">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2 class="subtitle"><a href="/win/">#win</a> accomplished by</h2>
				<h1><a href="/user/{{ $win->user_id }}">{{ $win->user->first_name }} {{ $win->user->last_name }}</a></h1>
			</div>
		</div>
	</div>
</section>
<section class="content">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-8">
				<h3>Tell us about this win</h3>
				{!! $win->description !!}
				<h3>Tell us what you did to achieve this win</h3>
				{!! $win->process !!}
			</div>
			<div class="col-12 col-lg-4">
				
			</div>
		</div>
	</div>
</section>
@endsection