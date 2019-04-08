@extends('layouts.app', ['title' => 'Business Journeys'])

@section('content')
<section class="welcome">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="billboard"><strong>Journeys</strong></h1>
			</div>
		</div>
	</div>
</section>
<section class="courses">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<ul class="course-list">
					@foreach($journeys as $journey)
						<li><a href="/journey/{{ $journey->slug }}">{{ $journey->title }}</a></li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
</section>	
@endsection