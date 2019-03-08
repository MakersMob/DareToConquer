@extends('layouts.app')

@section('content')
<section class="welcome">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1>Edit Webinar</h1>
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
						{!! Form::open(['url' => 'webinars/'.$webinar->id]) !!}
							@method('PUT')
							<div class="form-group">
								<label for="title">Title</label>
								<input class="form-control" type="text" name="title" id="title" value="{{ $webinar->title }}">
							</div>
							<div class="form-group">
								<label for="video">Video</label>
								<input class="form-control" type="text" name="video" id="video" value="{{ $webinar->video }}">
							</div>
							<div class="form-group">
								<label for="description">Description</label>
								<textarea class="form-control" name="description" rows="20">{!! $webinar->description !!}</textarea>
							</div>
							<button type="submit" class="btn btn-primary btn-lg btn-block">Update Webinar</button>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection