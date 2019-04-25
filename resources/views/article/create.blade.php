@extends('layouts.app')

@section('content')
<section class="welcome">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="text-center">Create a Article</h1>
			</div>
		</div>
	</div>
</section>
<section class="content">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						{!! Form::open(['url' => 'article', 'enctype' => 'multipart/form-data']) !!}
							<div class="row">
								<div class="col-12 col-lg-6">
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
								</div>
								<div class="col-12 col-lg-6">
									<div class="form-group">
										<label for="content">Content</label>
										<textarea class="form-control" name="content" rows="20"></textarea>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="custom-file">
								  <input type="file" class="custom-file-input" id="media" name="media">
								  <label class="custom-file-label" for="customFile">Choose file</label>
								</div>
							</div>
							<button type="submit" class="btn btn-primary">Publish Article</button>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection