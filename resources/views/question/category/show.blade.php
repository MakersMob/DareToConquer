@extends('layouts.app', ['title' => 'Questions about '.$cat])

@section('content')
<section class="welcome">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2 class="preheader"><a href="/questions">Online Business FAQ</a></h2>
				<h1 class=""><strong>{{ $cat }}</strong></h1>
				@role('admin')
					<div class="" style="margin-top: 2rem;"><a href="/questions/create" class="btn btn-primary">Add Question</a></div>
				@endrole
			</div>
		</div>
	</div>
</section>
<section class="content smoke lesson">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-8">
				<ul class="no-bullet sans-serif">
					@foreach($questions as $question)
						<li style="margin-bottom: 1rem;"><a href="/questions/{{ $question->slug }}" class="question-link">{{ $question->question }}</a></li>
					@endforeach
				</ul>
			</div>
			<div class="col-12 col-lg-4 sidebar">
				<h4>Categories</h4>
				<ul class="list-group" style="margin-bottom: 2rem;">
					<li class="list-group-item"><a style="border: none;" href="/questions/category/affiliate-marketing">Affiliate Marketing</a></li>
					<li class="list-group-item"><a style="border: none;" href="/questions/category/dtc">Dare to Conquer</a></li>
					<li class="list-group-item"><a style="border: none;" href="/questions/category/blogging">Blogging</a></li>
					<li class="list-group-item"><a style="border: none;" href="/questions/category/analytics">Google Analytics</a></li>
					<li class="list-group-item"><a style="border: none;" href="/questions/category/pinterest">Pinterest</a></li>
					<li class="list-group-item"><a style="border: none;" href="/questions/category/seo">SEO</a></li>
				</ul>
				<p>This stuff takes a long time to put together so I don&rsquo;t have time to write bullshit answers.</p>
				<p>Let&rsquo;s just get right to it.</p>
			</div>
		</div>
	</div>
</section>
@endsection