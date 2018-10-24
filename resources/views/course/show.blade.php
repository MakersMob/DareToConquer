@extends('layouts.app', ['title' => $course->name])

@section('content')
<section class="welcome course">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h3 class="preheader"><a href="/courses">Courses</a></h3>
				<h1>{{ $course->name }}</h1>
			</div>
		</div>
	</div>
</section>
<section class="content smoke">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12 col-lg-8">
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
									<td><a href="/courses/{{$course->slug}}/{{ $less->slug }}">{{ $less->name }}</a> @if($less->active == 0) UNPUBLISHED @endif</td>
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