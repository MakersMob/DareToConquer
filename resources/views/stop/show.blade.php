@extends('layouts.app', ['title' => $stop->name])

@section('content')
<section class="welcome course">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2 class="preheader"><a href="/journey/{{ $stop->journey->slug }}">{{ $stop->journey->title}}</a></h2>
				<h1 class="billboard"><strong>{{ $stop->name }}</strong></h1>
				@role('admin')
					<div class="" style="margin-top: 2rem;"><a href="/stop/{{ $stop->id }}/edit" class="btn btn-primary">Edit Stop</a></div>
				@endrole
			</div>
		</div>
	</div>
</section>
<section class="content smoke lesson">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12 main">
				{!! $stop->content !!}
			</div>
		</div>
	</div>
</section>
@endsection