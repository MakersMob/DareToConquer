@extends('layouts.app')

@section('content')
<section class="welcome">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1>Create a Stop</h1>
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
						{!! Form::open(['url' => 'stop/'.$stop->id, 'enctype' => 'multipart/form-data']) !!}
							@method('PUT')
							<div class="form-group">
								<label for="name">Name</label>
								<input class="form-control" type="text" name="name" id="name" value="{{ $stop->name }}">
							</div>
							<div class="form-group">
								<label for="journey_id">Journey</label>
								<select class="form-control" name="journey_id" id="module_id">
									@foreach($journeys as $journey)
										<option value="{{$journey->id}}" @if($stop->journey_id == $journey->id) selected @endif>{{ $journey->title }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label for="active">Status</label>
								<div class="form-check">
								  <input class="form-check-input" type="radio" name="active" id="exampleRadios1" value="1" @if($stop->active == 1) checked @endif>
								  <label class="form-check-label" for="exampleRadios1">
								    Published
								  </label>
								</div>
								<div class="form-check">
								  <input class="form-check-input" type="radio" name="active" id="exampleRadios2" value="0" @if($stop->active == 0) checked @endif>
								  <label class="form-check-label" for="exampleRadios2">
								    Draft
								  </label>
								</div>
								<div class="form-check">
								  <input class="form-check-input" type="radio" name="active" id="exampleRadios3" value="2" @if($stop->active == 2) checked @endif>
								  <label class="form-check-label" for="exampleRadios3">
								    Review
								  </label>
								</div>
							</div>
							<div class="form-group">
								<label for="content">Content</label>
								<textarea class="form-control" name="content" rows="20">{!! $stop->content !!}</textarea>
							</div>
							<div class="form-group">
								<div class="custom-file">
								  <input type="file" class="custom-file-input" id="media" name="media">
								  <label class="custom-file-label" for="customFile">Choose file</label>
								</div>
							</div>
							<button type="submit" class="btn btn-primary btn-lg btn-block">Update Stop</button>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
			<div class="col-12 col-lg-4">
				<h3>Media</h3>
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