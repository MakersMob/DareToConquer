@extends('layouts.app', ['title' => $framework->seo_title, 'description' => $framework->summary])

@section('content')
<section class="welcome course">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2 class="preheader"><a href="/framework">The DTC Business Framework</a></h2>
				<h1 class="">{{ $framework->title }}</h1>
				@role('admin')
					<div class="" style="margin-top: 2rem;"><a href="/framework/{{ $framework->id }}/edit" class="btn btn-primary">Edit Section</a></div>
				@endrole
			</div>
		</div>
	</div>
</section>
<section class="content lesson">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12 main">
				<p class="date text-muted">Updated: {{ date('F j, Y', strtotime($framework->updated_at)) }}</p>
				{!! $framework->content !!}
			</div>
		</div>
	</div>
</section>
<section class="content smoke">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-1 col-lg-8">
                <h2>Table of Contents</h2>
                <table class="table">
                <?php $c = 1; ?>
                @foreach($sections as $section)
                    @if(count($section->frameworks) > 0)
                        <tr class="section">
                            <td colspan="3">{{$section->title}}</td>
                        </tr>
                        <?php $c++;?>
                        <?php $count = 1; ?>
                        @foreach($section->frameworks as $fr)
                            <tr class="lessons @if($framework->id == $fr->id) active @endif">
                                <td><a href="/framework/{{ $fr->slug }}">{{ $fr->title }}</a> @if($fr->active == 0) **DRAFT** @endif @if($fr->active == 2) **REVIEW** @endif</td>
                            </tr>
                            <?php $count++;?>
                        @endforeach
                    @endif
                @endforeach
                </table>
            </div>
        </div>
    </div>
</section>
@endsection