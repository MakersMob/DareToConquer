<?php

namespace DareToConquer\Http\Controllers;

use Illuminate\Http\Request;
use DareToConquer\Lessonanswer;
use DareToConquer\Lessonquestion;
use DareToConquer\Lesson;
use DareToConquer\Mail\LessonquestionAnswered;
use Illuminate\Support\Facades\Mail;

class LessonanswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $answer = Lessonanswer::create([
            'lessonquestion_id' => $request->question_id,
            'lesson_id' => $request->lesson_id,
            'answer' => $request->answer
        ]);

        $question = Lessonquestion::find($request->question_id);

        $lesson = Lesson::find($request->lesson_id);

        Mail::to($question->user)->send(new LessonquestionAnswered($answer, $question->user));

        return redirect('/course/'.$lesson->course->slug.'/'.$lesson->slug.'#question-'.$question->id.'-link');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
