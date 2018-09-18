@extends('layouts.app')

@section('content')
<section class="welcome">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="text-center">Create a Question</h1>
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
						{!! Form::open(['url' => 'questions']) !!}
							<div class="form-group">
								<label for="slug">Slug</label>
								<input class="form-control" type="text" name="slug" id="slug">
							</div>
							<div class="form-group">
								<label for="description">Description</label>
								<input class="form-control" type="text" name="description" id="description">
							</div>
							<div class="form-group">
								<label for="question">Question</label>
								<textarea class="form-control" name="question" rows="8"></textarea>
							</div>
							<div class="form-group">
								<label for="answer">Answer</label>
								<textarea class="form-control" name="answer" rows="8"></textarea>
							</div>
							<div class="form-group">
								<label for="category">Category</label>
								<select class="form-control" name="category" id="category">
									<option value="Affiliate Marketing">Affiliate Marketing</option>
									<option value="BBC">BBC</option>
									<option value="Blogging">Blogging</option>
									<option value="Email">Email</option>
									<option value="Google Analytics">Google Analytics</option>
									<option value="Pinterest">Pinterest</option>
									<option value="SEO">SEO</option>
									<option value="WordPress">WordPress</option>
								</select>
							</div>
							<button type="submit" class="btn btn-primary">Create Question</button>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection