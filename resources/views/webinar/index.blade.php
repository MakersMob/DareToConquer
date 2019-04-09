@extends('layouts.app')

@section('content')
<section class="welcome">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="billboard"><strong>Member Webinars</strong></h1>
				@role('admin')
					<div class="" style="margin-top: 2rem;"><a href="/webinars/create" class="btn btn-primary">Add Webinar</a></div>
				@endrole
			</div>
		</div>
	</div>
</section>
<section class="courses">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<ul class="course-list">
					@foreach($webinars as $webinar)
						<li><a href="/webinars/{{$webinar->id}}">{{$webinar->title}}</a></li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
</section>
@endsection