@extends('layouts.app', ['title' => 'Community Newsletters'])

@section('content')
<section class="welcome">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1><span>Community Newsletters</span></h1>
			</div>
		</div>
	</div>
</section>
<section class="content directory smoke">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-6">
				<h2>The Ish</h2>
				<p>Every Sunday, the all-powerful Marybeth drops the Community Newsletter. Each week she saves a copy. Consider it your personal library without the clutter.</p>
			</div>
			<div class="col-12 col-lg-6">
				<ul>
					@foreach($newsletters as $newsletter)
						<li><a href="/newsletter/{{$newsletter->id}}">{{ $newsletter->subject}}</a></li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
</section>
@endsection