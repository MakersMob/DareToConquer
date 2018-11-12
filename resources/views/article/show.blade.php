@extends('layouts.app', ['title' => $article->title, 'description' => $article->summary])

@section('content')
<section class="welcome course">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="billboard"><strong>{{ $article->title }}</strong></h1>
				@role('admin')
					<div class="" style="margin-top: 2rem;"><a href="/article/{{ $article->id }}/edit" class="btn btn-primary">Edit Article</a></div>
				@endrole
			</div>
		</div>
	</div>
</section>
<section class="content lesson">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12 main">
				<p class="date text-muted">Updated: {{ date('F j, Y', strtotime($article->updated_at)) }}</p>
				{!! $article->content !!}
			</div>
		</div>
	</div>
</section>
@endsection