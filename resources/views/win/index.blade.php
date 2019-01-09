@extends('layouts.app', ['title' => 'Win by '.$win->user->first_name])

@section('content')
<section class="welcome exchange">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="billboard"><strong>#wins</strong></h1>
			</div>
		</div>
	</div>
</section>
<section class="content">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-8">
				@foreach($wins as $win)
					<div class="win">
						<h5>About {{ $win->user->first_name }}&rsquo;s win...</h5>
						{!! $win->description !!}
						<h5>How they did it...</h5>
						{!! $win->process !!}
					</div>
				@endforeach
			</div>
			<div class="col-12 col-lg-4">
				<p><a href="/win/create" class="btn btn-primary btn-lg btn-block">Add your #win</a></p>
				<p>Every step forward in your journey is a win. It's easy to get lost in the process and forget about the wins that you've accomplished.</p>
				<p>Here is your chance to share your wins (no such thing as small wins or big wins).</p>
			</div>
		</div>
	</div>
</section>
@endsection