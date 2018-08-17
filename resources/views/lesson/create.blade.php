@extends('layouts.app')

@section('content')
<section class="welcome">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1>Create a Lesson</h1>
			</div>
		</div>
	</div>
</section>
<section class="content smoke">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-8">
				<div class="card">
					<div class="card-body">
						{!! Form::open(['url' => 'lessons', 'enctype' => 'multipart/form-data']) !!}
							<div class="form-group">
								<label for="name">Name</label>
								<input class="form-control" type="text" name="name" id="name">
							</div>
							<div class="form-group">
								<label for="module_id">Module</label>
								<select class="form-control" name="module_id" id="module_id">
									@foreach($modules as $module)
										<option value="{{$module->id}}">[{{ $module->course->name}}] {{ $module->name }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label for="active">Make it live?</label>
								<div class="form-check">
								  <input class="form-check-input" type="radio" name="active" id="exampleRadios1" value="1" checked>
								  <label class="form-check-label" for="exampleRadios1">
								    Yes
								  </label>
								</div>
								<div class="form-check">
								  <input class="form-check-input" type="radio" name="active" id="exampleRadios2" value="2">
								  <label class="form-check-label" for="exampleRadios2">
								    No
								  </label>
								</div>
							</div>
							<div class="form-group">
								<label for="content">Content</label>
								<textarea class="form-control" name="content" rows="20"></textarea>
							</div>
							<div class="form-group">
								<div class="custom-file">
								  <input type="file" class="custom-file-input" id="media" name="media">
								  <label class="custom-file-label" for="customFile">Choose file</label>
								</div>
							</div>
							<button type="submit" class="btn btn-primary btn-lg btn-block">Create Lesson</button>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection