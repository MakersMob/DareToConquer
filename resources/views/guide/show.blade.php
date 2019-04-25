@extends('layouts.app', ['title' => $guide->seo_title, 'description' => $guide->summary])

@section('content')
<section class="welcome course">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h3 class="preheader"><a href="/guide">DTC Business Guides</a></h3>
				<h1 class="">{{ $guide->title }}</h1>
				@role('admin')
					<div class="" style="margin-top: 2rem;"><a href="/guide/{{ $guide->id }}/edit" class="btn btn-primary">Edit Guide</a></div>
				@endrole
			</div>
		</div>
	</div>
</section>
<section class="content lesson">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12 main">
				<p class="date text-muted">Updated: {{ date('F j, Y', strtotime($guide->updated_at)) }}</p>
				{!! $guide->content !!}
			</div>
		</div>
	</div>
</section>
@endsection