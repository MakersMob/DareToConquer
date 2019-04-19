<p>The rousing question is:</p>

{!! $question->question !!}

<p><a href="https://daretoconquer.com/course/{{ $question->lesson->course->slug }}/{{ $question->lesson->slug}}#question-{{$question->id}}-link">Click here to answer</a></p>