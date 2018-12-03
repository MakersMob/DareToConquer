@extends('layouts.app', ['title' => 'Dare to Conquer YouTube Videos'])

@section('content')
<section class="welcome">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="billboard">DTC <strong><a href="https://www.youtube.com/channel/UC8oSwL2gkSn_zH8wwJMIHrw">Youtube</a></strong> Videos</h1>
            </div>
        </div>
    </div>
</section>
<section class="content smoke">
	<div class="container">
		<div class="row">
			@foreach($youtubes as $youtube)
				<div class="col-12 col-lg-4">
					<div class="image">
						<a target="_blank" href="https://youtube.com/watch?v={{ $youtube->youtube_id }}"><img src="http://img.youtube.com/vi/{{ $youtube->youtube_id }}/mqdefault.jpg"></a>
						<p><small><strong><a href="https://youtube.com/watch?v={{ $youtube->youtube_id }}">{{ $youtube->title }}</a></strong></small></p>
					</div>
				</div>
			@endforeach
		</div>
	</div>
</section>
@endsection