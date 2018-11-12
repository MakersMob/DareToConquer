@extends('layouts.app', ['title' => 'Dare to Conquer Articles'])

@section('content')
<section class="welcome">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="billboard"><strong>The Articles</strong></h1>
			</div>
		</div>
	</div>
</section>
<section class="content lesson">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<ul class="course-list">
					@foreach($articles as $article)
						<li><a href="/{{ $article->slug }}">{{ $article->title }}</a></li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
</section>
@endsection