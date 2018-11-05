@extends('layouts.app', ['title' => 'The 60-Day Business Headstart'])

@section('content')
<section class="welcome">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="billboard"><strong>The 60-Day Business Headstart</strong></h1>
			</div>
		</div>
	</div>
</section>
<section class="lesson content">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<p>I'll make a prettier page as the Headstart moves along but for now this page will serve as a good way to view the previous days.</p>
				<ul>
					@foreach($days as $day)
						<li><a href="/headstart/{{ $day->slug }}">{{ $day->title }}</a></li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
</section>
@endsection