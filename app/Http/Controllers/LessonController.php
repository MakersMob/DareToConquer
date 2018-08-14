<?php

namespace DareToConquer\Http\Controllers;

use Illuminate\Http\Request;
use DareToConquer\Lesson;
use DareToConquer\Module;
use DareToConquer\Course;

class LessonController extends Controller
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
        $modules = Module::orderBy('id', 'DESC')->get();

        return view('lesson.create', compact('modules'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $module = Module::find($request->module_id);
        $order = 1;

        $less = Lesson::where('module_id', $request->module_id)->get();
        $l = $less->last();
        if($l) {
            $order = $l->order + 1;
        }
        

        $lesson = Lesson::create([
            'name' => $request->name,
            'content' => $request->content,
            'module_id' => $request->module_id,
            'course_id' => $module->course_id,
            'order' => $order,
        ]);

        $course = Course::find($module->course_id);

        return redirect('courses/'.$course->slug.'/'.$lesson->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($course, $id)
    {
        $lesson = Lesson::where('slug', $id)->firstOrFail();
        $modules = Module::where('course_id', $lesson->course_id)->with(['less' => function ($query) {
            $query->orderBy('order', 'ASC');
        }])->orderBy('order', 'ASC')->get();

        return view('lesson.show', compact('lesson', 'modules'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lesson = Lesson::find($id);
        $modules = Module::orderBy('id', 'DESC')->get();

        return view('lesson.edit', compact('lesson', 'modules'));
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
        $lesson = Lesson::find($id);
        $module = Module::find($request->module_id);

        $lesson->name = $request->name;
        $lesson->content = $request->content;
        $lesson->module_id = $request->module_id;
        $lesson->course_id = $module->course_id;
        $lesson->save();

        $course = Course::find($module->course_id);

        return redirect('courses/'.$course->slug.'/'.$lesson->slug);
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
