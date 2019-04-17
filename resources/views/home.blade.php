@extends('layouts.app')

@section('content')
<section class="welcome">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="billboard">Welcome Home, {{ Auth::user()->first_name }}</h1>
            </div>
        </div>
    </div>
</section>
<section class="content lesson vanilla">
<div class="container">
    <div class="row">
        <div class="col-12 col-lg-7">
            <div class="card" style="margin-bottom: 2rem;">
                <div class="card-header">Recently Added/Updated Lessons</div>

                <div class="card-body">
                    <table class="table data">
                        <thead>
                            <tr>
                                <td>Course</td>
                                <td>Lesson</td>
                                <td>Completion</td>
                                <td>Updated</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lessons as $lesson)
                                <tr>
                                    <td>{{ $lesson->course->name }}</td>
                                    <td><a href="/course/{{$lesson->course->slug}}/{{ $lesson->slug }}">{{ $lesson->name }}</a></td>
                                    <td>
                                        @if(Auth::user()->lessons->contains($lesson->id)) 
                                            <?php
                                                $less = Auth::user()->lessonCompleted($lesson->id);
                                            ?>
                                            {{ date('M jS', strtotime($less->pivot->updated_at)) }}
                                        @else
                                            <?php $less = ''; ?>
                                        @endif
                                    </td>
                                    <td @unless($less == '') @if($less->pivot->updated_at < $lesson->updated_at) class="updated" @endif @endunless>{{ date('M jS', strtotime($lesson->updated_at)) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @unless($stops == '')
            <div class="card">
                <div class="card-header">Recently Added/Updated Stops</div>

                <div class="card-body">
                    <table class="table data">
                        <thead>
                            <tr>
                                <td>Journey</td>
                                <td>Stop</td>
                                <td>Completion</td>
                                <td>Updated</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($stops as $stop)
                                <tr>
                                    <td>{{ $stop->journey->title }}</td>
                                    <td><a href="/journey/{{$stop->journey->slug}}/{{ $stop->slug }}">{{ $stop->name }}</a></td>
                                    <td>
                                        @if(Auth::user()->stops->contains($stop->id)) 
                                            <?php
                                                $st = Auth::user()->stopCompleted($stop->id);
                                            ?>
                                            {{ date('M jS', strtotime($st->pivot->updated_at)) }}
                                        @else
                                            <?php $st = ''; ?>
                                        @endif
                                    </td>
                                    <td @unless($st == '') @if($st->pivot->updated_at < $stop->updated_at) class="updated" @endif @endunless>{{ date('M jS', strtotime($stop->updated_at)) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endunless
        </div>
        <div class="col-12 col-lg-5 sidebar">
            <div class="tidbit">
                 <div class="card">
                    <div class="card-header">
                        DTC News
                    </div>
                    <div class="card-body">
                    @foreach($tidbits as $tidbit)
                        <p class="small date"><em>{{ date('F jS', strtotime($tidbit->created_at)) }}</em></p>
                        {!! $tidbit->content !!}
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
