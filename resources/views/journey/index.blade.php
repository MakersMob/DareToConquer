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
<section class="content">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<ul class="course-list">
					@foreach($journeys as $journey)
						<li class="text-center"><a href="/journey/{{ $journey->slug }}">{{ $journey->title }}</a></li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
</section>	
@endsection