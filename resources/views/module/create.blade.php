@extends('layouts.app')

@section('content')
<section class="welcome course">
  <div class="container">
  	<div class="row">
  		<div class="col-12">
        	<h1>Create a Module</h1>
  		</div>
  	</div>
  </div>
</section>
<section class="content smoke">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12 col-lg-6">
				<div class="card">
					<div class="card-body">
						{!! Form::open(['url' => 'modules']) !!}
							<div class="form-group">
								<label for="name">Name</label>
								<input class="form-control" type="text" name="name" id="name">
							</div>
							<div class="form-group">
								<label for="course_id">Course</label>
								<select class="form-control" name="course_id" id="course_id">
									@foreach($courses as $course)
										<option value="{{$course->id}}">{{ $course->name }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label for="description">Description</label>
								<textarea class="form-control" name="description" rows="8"></textarea>
							</div>
							<button type="submit" class="btn btn-primary">Create Module</button>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection