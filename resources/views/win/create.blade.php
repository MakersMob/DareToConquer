@extends('layouts.app', ['title' => 'Add a win'])

@section('content')
<section class="welcome exchange">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1><strong>Add a #win</strong></h1>
			</div>
		</div>
	</div>
</section>
<section class="content smoke">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-6">
				<div class="card">
					<div class="card-header">
						You&rsquo;re awesome. Record it.
					</div>
					<div class="card-body">
						{!! Form::open(['url' => 'win']) !!}
							<div class="form-group">
								<label for="description">What was your #win?</label>
								<textarea name="description" id="description" cols="" rows="5" class="form-control" required></textarea>
							</div>
							<div class="form-group">
								<label for="process">How did you accomplish this #win?</label>
								<textarea name="process" id="process" cols="" rows="5" class="form-control" required></textarea>
							</div>
							<button type="submit" class="btn btn-primary btn-block">Add #win</button>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
			<div class="col-12 col-lg-6">
				<p>A win is a win. Not only does it help to record your wins but it helps others see how they can make similar progress.</p>
			</div>
		</div>
	</div>
</section>
@endsection