<?php

namespace DareToConquer\Http\Controllers;

use Illuminate\Http\Request;
use DareToConquer\Note;
use DareToConquer\Lesson;
use DareToConquer\Module;
use Auth;

class NoteController extends Controller
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
        $notes = Note::create([
            'notes' => $request->notes,
            'lesson_id' => $request->lesson_id,
            'user_id' => Auth::user()->id
        ]);

        $lesson = Lesson::find($request->lesson_id);

        return redirect('course/'.$lesson->course->slug.'/'.$lesson->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($course, $id)
    {
        $lesson = Lesson::where('slug', $id)->first();
        $modules = Module::where('course_id', $lesson->course_id)->where('active', 1)->with(['less' => function ($query) {
            $query->where('active', '1');
            $query->orderBy('order', 'ASC');
        }])->orderBy('order', 'ASC')->get();

        $notes = Note::where('lesson_id', $lesson->id)->where('user_id', Auth::user()->id)->first();

        return view('note.lesson', compact('notes', 'lesson', 'modules'));
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
        $notes = Note::find($id);

        $notes->notes = $request->notes;
        $notes->save();

        $lesson = Lesson::find($notes->lesson_id);
        
        $modules = Module::where('course_id', $lesson->course_id)->where('active', 1)->with(['less' => function ($query) {
            $query->where('active', '1');
            $query->orderBy('order', 'ASC');
        }])->orderBy('order', 'ASC')->get();

        $notes = Note::where('lesson_id', $lesson->id)->where('user_id', Auth::user()->id)->first();

        return view('note.lesson', compact('notes', 'lesson', 'modules'));
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
