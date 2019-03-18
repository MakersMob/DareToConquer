@extends('layouts.app')

@section('content')
<section class="welcome home">
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
<section class="content">
	<div class="container">
		<div class="row">
			<div class="col-12 @role('bronze') col-lg-6 @endhasrole">
				<ul class="@role('bronze')mini-course-list @endhasrole course-list">
					@foreach($webinars as $webinar)
						<li><a href="/webinars/{{$webinar->id}}">{{$webinar->title}}</a></li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
</section>
@endsection