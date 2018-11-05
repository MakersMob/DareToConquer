@extends('layouts.app')

@section('content')
<section class="content lesson">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @hasrole('gold')<p>The <a href="/courses/seo">SEO Course</a> is now slowly rolling out.</p>@endhasrole
            <p>This page is just a placeholder. You're looking for <a href="/courses/pinterest">the Pinterest Course</a>.</p>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">Recently Updated Lessons</div>

                <div class="card-body">
                    <table class="table data">
                        <thead>
                            <tr>
                                <td>Course</td>
                                <td>Lesson</td>
                                <td>Your Completion Date</td>
                                <td>Updated On</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lessons as $lesson)
                                <tr>
                                    <td>{{ $lesson->course->name }}</td>
                                    <td><a href="/courses/{{$lesson->course->slug}}/{{ $lesson->slug }}">{{ $lesson->name }}</a></td>
                                    <td>
                                        @if(Auth::user()->lessons->contains($lesson->id)) 
                                            <?php
                                                $less = Auth::user()->lessonCompleted($lesson->id);
                                            ?>
                                            {{ date('F j, Y', strtotime($less->pivot->updated_at)) }}
                                        @else
                                            <?php $less = ''; ?>
                                        @endif
                                    </td>
                                    <td @unless($less == '') @if($less->pivot->updated_at < $lesson->updated_at) class="updated" @endif @endunless>{{ date('F j, Y', strtotime($lesson->updated_at)) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $lessons->links() }}
        </div>
    </div>
</div>
</section>
@endsection
