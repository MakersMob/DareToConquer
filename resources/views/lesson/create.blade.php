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
						{!! Form::open(['url' => 'lessons']) !!}
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
								<label for="content">Content</label>
								<textarea class="form-control" name="content" rows="20"></textarea>
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