@extends('layouts.app')

@section('content')
<section class="welcome">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1>Create Worksheet Question</h1>
			</div>
		</div>
	</div>
</section>
<section class="content smoke">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12 col-lg-8">
				<div class="card">
					<div class="card-body">
						{!! Form::open(['url' => 'worksheets']) !!}
							<div class="form-group">
								<label for="description">Description</label>
								<input class="form-control" type="text" name="description" id="description">
							</div>
							<div class="form-group">
								<label for="lesson_id">Lesson</label>
								<select class="form-control" name="lesson_id" id="lesson_id">
									@foreach($lessons as $lesson)
										<option value="{{$lesson->id}}">[{{ $lesson->course->name}}] {{ $lesson->name }}</option>
									@endforeach
								</select>
							</div>
							<button type="submit" class="btn btn-primary btn-lg btn-block">Create Worksheet Question</button>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection