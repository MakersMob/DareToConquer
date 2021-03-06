@extends('layouts.app', ['title' => $course->name])

@section('content')
<section class="welcome course">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h3 class="preheader"><a href="/course">Courses</a></h3>
				<h1><strong>{{ $course->name }}</strong></h1>
				<p><a href="/course/{{ $course->slug }}/pdf" class="btn btn-primary">Download Course PDF</a></p>
			</div>
		</div>
	</div>
</section>
<section class="content">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-6">
				<!--<ul class="nav nav-tabs">
				  <li class="nav-item">
				    <a class="nav-link active" href="#">Lessons</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" href="/course/{{ $course->slug }}/notes" tabindex="-1">Notes</a>
				  </li>
				</ul>-->
				<table class="table">
					<?php $c = 1; ?>
					@foreach($modules as $module)
						@if(count($module->less) > 0)
							<tr class="section">
								<td colspan="3">Module {{$c}}: {{$module->name}}</td>
							</tr>
							<?php $c++;?>
							<?php $count = 1; ?>
							@foreach($module->less as $less)
								<tr class="lessons">
									<td>{{ $count }}</td>
									<td><a href="/course/{{$course->slug}}/{{ $less->slug }}">{{ $less->name }}</a> @if($less->active == 0) **DRAFT** @endif @if($less->active == 2) **REVIEW** @endif</td>
									<td>@if(Auth::user()->lessons->contains($less->id)) &#x2714; @endif</td>
								</tr>
								<?php $count++;?>
							@endforeach
						@endif
					@endforeach
				</table>
			</div>
		</div>
	</div>
</section>
@endsection