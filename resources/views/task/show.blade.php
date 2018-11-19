@extends('layouts.app', ['title' => 'Task Completed by '])

@section('content')
<section class="welcome exchange">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2 class="subtitle"><a href="/exchange/{{ $task->exchange_id }}">Task</a> Completed By</h2>
				<h1><a href="/user/{{ $task->user_id }}">{{ $task->user->first_name }} {{ $task->user->last_name }}</a></h1>
			</div>
		</div>
	</div>
</section>
<section class="content">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-4">
				<p><a href="{{ $task->url }}" class="btn btn-lg btn-primary">View completed task</a></p>
				@if($task->status == 0)
					{!! Form::open(['url' => 'taskcomplete']) !!}
						<input type="hidden" name="task_id" value="{{ $task->id }}">
						<button type="submit" class="btn btn-success btn-lg">&#10003; Mark Task Completed</button>
					{!! Form::close() !!}
				@else 
					<p>You marked this task as completed {{ $task->updated_at->diffForHumans() }}.</p>
				@endif
			</div>
			<div class="col-12 col-lg-8">
				<p><a href="/user/{{ $task->user_id }}">{{ $task->user->first_name }} {{ $task->user->last_name }}</a> completed your task {{ $task->created_at->diffForHumans() }}.</p>
			</div>
		</div>
	</div>
</section>
@endsection