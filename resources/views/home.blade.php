@extends('layouts.app')

@section('content')
<section class="content">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Recently Updated Lessons</div>

                <div class="card-body">
                    <ul class="list-unstyled">
                    @foreach($lessons as $lesson)
                        <li><a href="/courses/{{$lesson->course->slug}}/{{ $lesson->slug }}">{{ $lesson->name }}</a></li>
                    @endforeach
                </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
