@extends('layouts.app')

@section('content')
<section class="welcome">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2 class="preheader">Editing</h2>
				<h1>{{ $archive->title }}</h1>
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
						{!! Form::open(['url' => 'archives/'.$archive->id, 'method' => 'patch', 'class' => 'callout']) !!}
							<div class="form-group">
								<label for="title">Title</label>
								<input class="form-control" type="text" name="title" id="title" value="{{$archive->title}}">
							</div>
							<div class="form-group">
								<label for="email">Email</label>
								<textarea class="form-control" type="text" name="email" id="email" rows="8">{{$email}}</textarea>
							</div>
							<button type="submit" class="btn btn-large btn-block btn-primary">Update Archive</button>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection