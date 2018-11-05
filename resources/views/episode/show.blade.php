@extends('layouts.app', ['title' => $episode->seo_title, 'description' => $episode->summary])

@section('content')
<section class="welcome course">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2 class="preheader"><a href="/empire-builder">Empire Builder: Season {{ $episode->season }}</a></h2>
				<h1 class="">{{ $episode->title }}</h1>
				@role('admin')
					<div class="" style="margin-top: 2rem;"><a href="/episode/{{ $episode->id }}/edit" class="btn btn-primary">Edit Episode</a></div>
				@endrole
			</div>
		</div>
	</div>
</section>
<section class="content smoke lesson">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12 main">
				@if($episode->youtube)
					<div class="embed-responsive embed-responsive-16by9">
						<iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $episode->youtube }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					</div>
				@endif
				<p class="date text-muted">Updated: {{ date('F j, Y', strtotime($episode->updated_at)) }}</p>
				{!! $episode->content !!}
			</div>
		</div>
	</div>
</section>
<section class="content lesson">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2>Other Episodes from Season 1 of Empire Builder</h2>
				<ol>
					@foreach($episodes as $ep)
						<li><a href="/empire-builder/episode/{{ $ep->slug }}">{{ $ep->title }}</a></li>
					@endforeach
				</ol>
			</div>
		</div>
	</div>
</section>
@endsection