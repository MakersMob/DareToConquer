@extends('layouts.app')

@section('content')
<section class="content lesson">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @hasrole('gold')<p>The <a href="/courses/seo">SEO Course</a> is now slowly rolling out.</p>@endhasrole
            <p>This page is just a placeholder. You're looking for <a href="/courses/pinterest">the Pinterest Course</a>.</p>
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
