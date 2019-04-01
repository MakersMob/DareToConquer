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
		<div class="row justify-content-center">
			<div class="col-12 col-lg-8">
				<div class="card">
					<div class="card-body">
						{!! Form::open(['url' => 'set', 'enctype' => 'multipart/form-data']) !!}
							<div class="form-group">
								<label for="title">Title</label>
								<input class="form-control" type="text" name="title" id="title">
							</div>
							<div class="form-group">
								<label for="content">Description</label>
								<textarea class="form-control" name="description" rows="20"></textarea>
							</div>
							<div class="form-group">
								<label for="active">Status</label>
								<div class="form-check">
								  <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="1">
								  <label class="form-check-label" for="exampleRadios1">
								    Published
								  </label>
								</div>
								<div class="form-check">
								  <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="0" checked>
								  <label class="form-check-label" for="exampleRadios2">
								    Draft
								  </label>
								</div>
								<div class="form-check">
								  <input class="form-check-input" type="radio" name="status" id="exampleRadios3" value="2">
								  <label class="form-check-label" for="exampleRadios3">
								    Review
								  </label>
								</div>
							</div>
							<button type="submit" class="btn btn-primary btn-lg btn-block">Create Set</button>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection