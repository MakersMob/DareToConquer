@extends('layouts.app', ['title' => 'Dare To Conquer Challenge: '.$challenge->title])

@section('content')
<section class="welcome">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="billboard">DTC Challenge: {{ $challenge->title }}</strong></h1>
			</div>
		</div>
	</div>
</section>
<section class="content smoke lesson">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-6">
				<table class="table">
					<?php $c = 1; ?>
					@foreach($challenge->sets as $set)
						@if(count($set->exercises) > 0)
							<tr class="">
								<td colspan="3"><a href="/challenge/{{ $challenge->id }}/set/{{ $set->id }}">Set {{$c}}: {{$set->title}}</a></td>
							</tr>
							<?php $c++;?>
						@endif
					@endforeach
				</table>
			</div>
			<div class="col-12 col-lg-6">
				
			</div>
		</div>
	</div>
</section>
@endsection