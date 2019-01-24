@extends('layouts.app', ['title' => $newsletter->subject])

@section('content')
<section class="welcome">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2 class="preheader"><a href="/newsletter">Newsletters</a></h2>
				<h1><span>{{ $newsletter->subject }}</span></h1>
				@role('admin')
				  <p><a href="/newsletter/{{ $newsletter->id }}/edit" class="btn btn-primary">Edit Newsletter</a></p>
				@endrole
			</div>
		</div>
	</div>
</section>
<section class="content directory smoke lesson">
	<div class="container">
		<div class="row">
			<div class="col-12">
				{!! $newsletter->newsletter !!}
			</div>
		</div>
	</div>
</section>
@endsection