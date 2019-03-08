@extends('layouts.app', ['title' => 'DTC Testimonial'])

@section('content')
<section class="welcome course">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2 class="preheader"><a href="/testimonial">Testimonial</a></h2>
				<h1 class="">Testimonial</h1>
			</div>
		</div>
	</div>
</section>
<section class="content lesson">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12 main">
				{!! $testimonial->content !!}
			</div>
		</div>
	</div>
</section>
@endsection