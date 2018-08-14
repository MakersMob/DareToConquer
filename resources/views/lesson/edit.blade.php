@extends('layouts.app')

@section('content')
<section class="welcome">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2>Update Lesson</h2>
				<h1>{{ $lesson->name }}</h1>
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
						{!! Form::open(['url' => 'lessons/'.$lesson->id]) !!}
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
								<label for="content">Content</label>
								<textarea class="form-control" name="content" rows="20">{{ $lesson->content }}</textarea>
							</div>
							<button type="submit" class="btn btn-primary btn-lg btn-block">Update Lesson</button>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection