@extends('layouts.app')

@section('content')
<section class="welcome">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="text-center">Edit Guide</h1>
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
						{!! Form::open(['url' => 'guide/'.$guide->id, 'method' => 'patch', 'class' => 'callout','enctype' => 'multipart/form-data']) !!}
							<div class="form-group">
								<label for="slug">Slug</label>
								<input class="form-control" type="text" name="slug" id="slug" value="{{ $guide->slug }}">
							</div>
							<div class="form-group">
								<label for="summary">Summary</label>
								<input class="form-control" type="text" name="summary" id="summary" value="{{ $guide->summary }}">
							</div>
							<div class="form-group">
								<label for="title">Title</label>
								<input class="form-control" type="text" name="title" id="title" value="{{ $guide->title }}">
							</div>
							<div class="form-group">
								<label for="title">SEO Title</label>
								<input class="form-control" type="text" name="seo_title" id="seo_title" value="{{ $guide->seo_title }}">
							</div>
							<div class="form-group">
								<label for="content">Content</label>
								<textarea class="form-control" name="content" rows="8">{{ $guide->content }}</textarea>
							</div>
							<div class="form-group">
								<label for="active">Make it live?</label>
								<div class="form-check">
								  <input class="form-check-input" type="radio" name="active" id="exampleRadios1" value="1" @if($guide->active == 1) checked @endif>
								  <label class="form-check-label" for="exampleRadios1">
								    Yes
								  </label>
								</div>
								<div class="form-check">
								  <input class="form-check-input" type="radio" name="active" id="exampleRadios2" value="0" @if($guide->active == 0) checked @endif>
								  <label class="form-check-label" for="exampleRadios2">
								    No
								  </label>
								</div>
							</div>
							<div class="form-group">
								<div class="custom-file">
								  <input type="file" class="custom-file-input" id="media" name="media">
								  <label class="custom-file-label" for="customFile">Choose file</label>
								</div>
							</div>
							<button type="submit" class="btn btn-primary">Create Guide</button>
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
				<p>Image code:</p>
				<code>
					&lt;div class="image"&gt;<br>
						&lt;img src="blahblahblah.jpg"&gt;<br>
					&lt;/div&gt;
				</code>
			</div>
		</div>
	</div>
</section>
@endsection