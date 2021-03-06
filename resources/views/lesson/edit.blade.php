@extends('layouts.app')

@section('content')
<section class="welcome">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2 class="preheader">Update Lesson</h2>
				<h1>{{ $lesson->name }}</h1>
			</div>
		</div>
	</div>
</section>
<section class="content">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12 col-lg-8">
				<div class="card">
					<div class="card-body">
						{!! Form::open(['url' => 'lessons/'.$lesson->id, 'enctype' => 'multipart/form-data']) !!}
							@method('PUT')
							<div class="form-group">
								<label for="name">Name</label>
								<input class="form-control" type="text" name="name" id="name" value="{{ $lesson->name }}">
							</div>
							<div class="form-group">
								<label for="module_id">Module</label>
								<select class="form-control" name="module_id" id="module_id">
									@foreach($modules as $module)
										<option value="{{$module->id}}" @if($module->id == $lesson->module_id) selected @endif>[{{ $module->course->name}}] {{ $module->name }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label for="active">Status</label>
								<div class="form-check">
								  <input class="form-check-input" type="radio" name="active" id="exampleRadios1" value="1" @if($lesson->active == 1) checked @endif>
								  <label class="form-check-label" for="exampleRadios1">
								    Publish
								  </label>
								</div>
								<div class="form-check">
								  <input class="form-check-input" type="radio" name="active" id="exampleRadios2" value="0" @if($lesson->active == 0) checked @endif>
								  <label class="form-check-label" for="exampleRadios2">
								    Draft
								  </label>
								</div>
								<div class="form-check">
								  <input class="form-check-input" type="radio" name="active" id="exampleRadios3" value="2" @if($lesson->active == 2) checked @endif>
								  <label class="form-check-label" for="exampleRadios3">
								    Review
								  </label>
								</div>
							</div>
							<div class="form-group">
								<label for="content">Content</label>
								<textarea class="form-control" name="content" rows="20">{{ $content }}</textarea>
							</div>
							<div class="form-group">
								<div class="custom-file">
								  <input type="file" class="custom-file-input" id="media" name="media">
								  <label class="custom-file-label" for="customFile">Choose file</label>
								</div>
							</div>
							<button type="submit" class="btn btn-primary btn-lg btn-block">Update Lesson</button>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
			<div class="col-12 col-lg-4">
				<h4 style="margin-top: 0;">Media</h4>
				@foreach($media as $med) 
					<div class="image">
						<img src="{{ $med->getFullUrl() }}">
						<br><span>{{ $med->getFullUrl() }}</span>
					</div>
				@endforeach
			</div>
		</div>
	</div>
</section>
@endsection