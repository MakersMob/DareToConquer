@extends('layouts.app', ['title' => 'Create a Bundle'])

@section('content')
<section class="welcome">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1>Create a Bundle</h1>
			</div>
		</div>
	</div>
</section>
<section class="content directory">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-8">
				<div class="card">
					<div class="card-header">
						Business Details
					</div>
					<div class="card-body">
						{!! Form::open(['url' => 'bundles']) !!}
							<div class="row">
								<div class="col-12 col-lg-6">
									<div class="form-group">
										<label for="name">Name</label>
										<input class="form-control" type="text" id="name" name="name" required>
									</div>
								</div>
								<div class="col-12 col-lg-3">
									<div class="form-group">
										<label for="slug">Slug</label>
										<input class="form-control" type="text" id="slug" name="slug" required>
									</div>
								</div>
								<div class="col-12 col-lg-3">
									<div class="form-group">
										<label for="price">Price</label>
										<input class="form-control" type="number" id="price" name="price" value="" >
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="niche">What courses are included?</label>
								<div class="row">
									@foreach($courses as $course)
										<div class="col-12 col-lg-6">
											<label class="form-check-label">
												<input class="form-check-input" type="checkbox" value="{{ $course->id}}" name="courses[]"> {{ $course->name }}
											</label>
										</div>
									@endforeach
								</div>
							</div>
							<div class="form-group">
								<label for="description">Description</label>
								<textarea class="form-control" name="description" id="description" cols="" rows="10"></textarea>
							</div>
							<button type="submit" class="btn btn-large btn-primary btn-block">Create Bundle</button>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection