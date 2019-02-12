@extends('layouts.app', ['title' => 'DTC Framework'])

@section('content')
<section class="welcome home">
  <div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="billboard"><strong>The DTC Business Framework</strong></h1>
        </div>
    </div>
  </div>
</section>
<section class="content lesson">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <p>Is there a step-by-step way to build a successful business? I don't think so but that's only because there are obstacles that are unique to you.</p>
            <p>However, that doesn't mean you can't follow a roadmap. Some set of guidelines that will at least make sure you don't run out of water or food on your journey.</p>
            <p><em>The DTC Business Framework</em> is meant to show you the big picture of creating a successful online business.</p>
            <p>Consider it your reference point in deciding what moves you should make next in this wonderful journey of yours.</p>
            <p>It's completely free because things like this should be free.</p>
            <p>Let's get started.</p>
        </div>
    </div>
</div>
</section>
<section class="content smoke">
    <div class="container">
        <div class="row">
            <div class="col-12">
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
                        @foreach($section->frameworks as $framework)
                            <tr class="lessons">
                                <td><a href="/framework/{{ $framework->slug }}">{{ $framework->title }}</a> @if($framework->active == 0) **DRAFT** @endif @if($framework->active == 2) **REVIEW** @endif</td>
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
