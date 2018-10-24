@extends('layouts.app', ['title' => $question->question, 'description' => $question->description])

@section('content')
<section class="welcome course">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2 class="preheader"><a href="/questions" rel="nofollow">The Online Business FAQ</a> // <a href="/questions/category/{{ $question->category }}">{{ $question->category }}</a></h2>
				<h1 class="billboard">{{ $question->question }}</h1>
				@role('admin')
					<div class="" style="margin-top: 2rem;"><a href="/questions/{{ $question->id }}/edit" class="btn btn-primary">Edit Question</a></div>
				@endrole
			</div>
		</div>
	</div>
</section>
<section class="content lesson">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12 main">
				<p class="date text-muted">Updated: {{ date('F j, Y', strtotime($question->updated_at)) }}</p>
				{!! $question->answer !!}
			</div>
		</div>
	</div>
</section>
<section class="content smoke lesson">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12 col-lg-8">
				<h2>Other <a href="/questions/category/{{ $question->category }}">{{ $question->category }}</a> Questions</h2>
				<ul class="no-bullet sans-serif">
					@foreach($questions as $q)
						@unless($q->id == $question->id)
						<li style="margin-bottom: 1rem;"><a href="/questions/{{ $q->slug }}" class="question-link">{{ $q->question }}</a></li>
						@endunless
					@endforeach
				</ul>
			</div>
		</div>
	</div>
</section>
@endsection