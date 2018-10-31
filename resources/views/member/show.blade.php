@extends('layouts.app', ['title' => $user->first_name.' '.$user->last_name.' profile on Dare to Conquer'])

@section('content')
<section class="welcome">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2 class="preheader">DTC Member Since {{ date('F Y', strtotime($user->created_at)) }}</h2>
				<?php 
					$grav_url = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $user->email ) ) ); 
				?>
				<h1><img src="{{ $grav_url }}" class="avatar-image" alt="{{ $user->first_name }} {{ $user->last_name }}"> {{ $user->first_name }} {{ $user->last_name }}</h1>
			</div>
		</div>
	</div>
</section>
<section class="content directory smoke">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-6">
				
			</div>
		</div>
	</div>
</section>
@endsection