@extends('layouts.app')

@section('content')
<section class="content">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12 col-lg-8">
				<h2 class="text-center">Create an Objective</h2>
				<div class="card">
					<div class="card-body">
						{!! Form::open(['url' => 'objectives']) !!}
							<div class="form-group">
								<label for="title">Title</label>
								<input class="form-control" type="text" name="title" id="title">
							</div>
							<div class="form-group">
								<label for="lesson_id">Lesson</label>
								<select class="form-control" name="lesson_id" id="lesson_id">
									@foreach($lessons as $lesson)
										<option value="{{$lesson->id}}">[{{ $lesson->course->name}}] {{ $lesson->name }}</option>
									@endforeach
								</select>
							</div>
							<button type="submit" class="btn btn-primary btn-block">Create Lesson</button>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection