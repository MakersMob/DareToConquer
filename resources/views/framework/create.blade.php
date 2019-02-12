@extends('layouts.app')

@section('content')
<section class="welcome">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="text-center">Create a Framework Page</h1>
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
						{!! Form::open(['url' => 'framework']) !!}
							<div class="form-group">
								<label for="section_id">Module</label>
								<select class="form-control" name="section_id" id="section_id">
									@foreach($sections as $section)
										<option value="{{$section->id}}">{{ $section->title }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label for="slug">Slug</label>
								<input class="form-control" type="text" name="slug" id="slug">
							</div>
							<div class="form-group">
								<label for="summary">Summary</label>
								<input class="form-control" type="text" name="summary" id="summary">
							</div>
							<div class="form-group">
								<label for="title">Title</label>
								<input class="form-control" type="text" name="title" id="title">
							</div>
							<div class="form-group">
								<label for="title">SEO Title</label>
								<input class="form-control" type="text" name="seo_title" id="seo_title">
							</div>
							<div class="form-group">
								<label for="content">Content</label>
								<textarea class="form-control" name="content" rows="8"></textarea>
							</div>
							<div class="form-group">
								<label for="order">Season</label>
								<input class="form-control" type="number" name="order" id="order">
							</div>
							<div class="form-group">
								<label for="active">Status</label>
								<div class="form-check">
								  <input class="form-check-input" type="radio" name="active" id="exampleRadios1" value="1">
								  <label class="form-check-label" for="exampleRadios1">
								    Published
								  </label>
								</div>
								<div class="form-check">
								  <input class="form-check-input" type="radio" name="active" id="exampleRadios2" value="0" checked>
								  <label class="form-check-label" for="exampleRadios2">
								    Draft
								  </label>
								</div>
								<div class="form-check">
								  <input class="form-check-input" type="radio" name="active" id="exampleRadios3" value="2">
								  <label class="form-check-label" for="exampleRadios3">
								    Review
								  </label>
								</div>
							</div>
							<button type="submit" class="btn btn-primary">Create Framework Stuff</button>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection