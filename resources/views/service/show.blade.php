@extends('layouts.app', ['title' => $service->name])

@section('content')
<section class="welcome course">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2 class="preheader"><a href="/service">Member Services Directory</a></h2>
				<h1 class="">{{ $service->name }}</h1>
				<h3 class="subheader">by {{ $service->user->first_name }} {{ $service->user->last_name }}</h3>
				@if(Auth::user()->id == $service->user_id)
					<div class="" style="margin-top: 2rem;"><a href="/service/{{ $service->id }}/edit" class="btn btn-primary">Edit Service</a> <a href="/service/{{ $service->id }}/delete" class="btn btn-primary btn-alert">Delete Service</a></div>
				@endrole
			</div>
		</div>
	</div>
</section>
<section class="content smoke lesson">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12 main">
				{!! $service->description !!}
			</div>
		</div>
	</div>
</section>
@endsection