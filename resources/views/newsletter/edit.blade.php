@extends('layouts.app')

@section('content')
<section class="welcome course">
  <div class="container">
  	<div class="row">
  		<div class="col-12">
        	<h1>Update Newsletter</h1>
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
						{!! Form::open(['url' => 'newsletter/'.$newsletter->id]) !!}
							@method('PUT')
							<div class="form-group">
								<label for="name">Subject</label>
								<input class="form-control" type="text" name="subject" id="subject" value="{{ $newsletter->subject}}">
							</div>
							<div class="form-group">
								<label for="newsletter">Newsletter</label>
								<textarea class="form-control" name="newsletter" rows="8">{{ $newsletter->newsletter }}</textarea>
							</div>
							<button type="submit" class="btn btn-primary">Create Newsletter</button>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection