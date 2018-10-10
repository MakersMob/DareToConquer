@extends('layouts.app', ['title' => $archive->title, 'description' => $archive->title])

@section('content')
<section class="welcome">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2 class="preheader"><strong><a href="/archives" rel="nofollow">BBC Email Archives</a></strong></h2>
				<h1 class="billboard"><strong>{{ $archive->title }}</strong></h1>
				@role('admin')
					<div class="" style="margin-top: 2rem;"><a href="/archives/{{ $archive->id }}/edit" class="btn btn-primary">Edit Archive</a></div>
				@endrole
			</div>
		</div>
	</div>
</section>
<section class="content lesson">
	<div class="container">
		<div class="row">
			<div class="col-12">
				{!! $archive->email !!}
			</div>
		</div>
	</div>
</section>
<section class="content">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-8">
				<h3>Other <a href="/archives/">Archives</a></h3>
				<ul class="no-bullet sans-serif">
					@foreach($archives as $q)
						@unless($q->id == $archive->id)
						<li style="margin-bottom: 1rem;"><a href="/archives/{{ $q->slug }}" class="question-link">{{ $q->title }}</a></li>
						@endunless
					@endforeach
				</ul>
			</div>
		</div>
	</div>
</section>
@endsection