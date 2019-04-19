<?php

namespace DareToConquer\Http\Controllers;

use Illuminate\Http\Request;
use DareToConquer\Lessonquestion;
use DareToConquer\Lesson;
use Auth;
use DareToConquer\Mail\LessonquestionAsked;
use Illuminate\Support\Facades\Mail;

class LessonquestionController extends Controller
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
        $question = Lessonquestion::create([
            'question' => $request->question,
            'user_id' => Auth::user()->id,
            'lesson_id' => $request->lesson_id
        ]);

        $lesson = Lesson::find($request->lesson_id);

        Mail::to(['scrivs@daretoconquer.com', 'marybeth@daretoconquer.com'])->send(new LessonquestionAsked($question));

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
