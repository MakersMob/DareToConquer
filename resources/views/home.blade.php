@extends('layouts.app')

@section('content')
<section class="welcome">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="billboard"><strong>Welcome Home, {{ Auth::user()->first_name }}</strong></h1>
            </div>
        </div>
    </div>
</section>
<section class="content lesson">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Recently Added/Updated Lessons</div>

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
