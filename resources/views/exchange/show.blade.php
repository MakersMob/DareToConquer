@extends('layouts.app')

@section('content')
<section class="welcome exchange">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2 class="preheader"><a href="/exchange">Member Exchange</a></h2>
				<h1>Task for <a href="/member/{{ $exchange->user->id }}">{{ $exchange->user->first_name }} {{ $exchange->user->last_name }}</a></h1>
				@if(Auth::user()->id == $exchange->user_id)
					<div style="margin-top: 1rem;">
						<a href="/exchange/{{ $exchange->id }}/edit" class="btn btn-primary">Edit Task</a> 
						<a href="/exchange/{{ $exchange->id }}/close" class="btn btn-warning btn-lg ">Close Task</a>
					</div>
				@endif
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
						The Details
					</div>
					<div class="card-body">
						<p><a href="{{ $exchange->url }}" target="_blank" rel="nofollow" class="btn btn-primary btn-lg btn-block">Click here to go to the task</a></p>
						{!! $exchange->description !!}
					</div>
				</div>
			</div>
			<div class="col-12 col-lg-6">
				@if(Auth::user()->id == $exchange->user_id)
					<div class="card">
						<div class="card-header">
							Unrewarded Members
						</div>
						<div class="card-body">
							@foreach($exchange->tasks as $task)
								@if($task->status == 0)
									<li><a href="/task/{{ $task->id }}">{{ $task->user->first_name }} {{ $task->user->last_name }}</a></li>
								@endif
							@endforeach
						</div>
					</div>
				@elseif(Auth::user()->tasks->contains('exchange_id', $exchange->id))
					<p><strong>Great job, you&rsquo;ve completed the task!</strong> {{ $exchange->user->first_name }} {{ $exchange->user->last_name }} has been alerted and will review it shortly so you can get your points.</p>
					<p>Why don't you <a href="/exchange">help out other Dare to Conquer members</a> now?</p>
				@else
					<div class="card">
						<div class="card-header">
							Did you complete this task?
						</div>
						<div class="card-body">
							{!! Form::open(['url' => 'task']) !!}
								<div class="form-group">
									<label for="url">URL</label>
									<input type="text" class="form-control" name="url" id="url" required>
									<small class="form-text text-muted">How can the blogger verify that you've completed the task? Link directly to completion evidence.</small>
								</div>
								<div class="form-group">
									<label for="comment">Comment</label>
									<textarea class="form-control" name="comment" id="comment" cols="" rows="10"></textarea>
									<small class="form-text text-muted">Not required but everybody likes a little feedback.</small>
								</div>
								<input type="hidden" name="exchange_id" value="{{ $exchange->id }}">
								<button type="submit" class="btn btn-primary">Submit</button>
							{!! Form::close() !!}
						</div>
					</div>
				@endif
			</div>
		</div>
	</div>
</section>
@endsection