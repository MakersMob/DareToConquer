<?php

namespace DareToConquer\Http\Controllers;

use Illuminate\Http\Request;
use DareToConquer\Lesson;
use DareToConquer\Module;
use DareToConquer\Course;
use DareToConquer\Note;
use Auth;
use League\HTMLToMarkdown\HtmlConverter;

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
        //dd($request->media);
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
            'active' => $request->active,
        ]);

        $course = Course::find($module->course_id);
        if(isset($request->media)) {
            $lesson->addMediaFromRequest('media')->toMediaCollection('media');
        }

        //dd($media);
        // foreach($media as $med) {
        // //     //dd($med);
        //      $lesson->addMedia($med)->toMediaCollection('media');
        // }
        // $fileAdders = $lesson
        //       ->addMultipleMediaFromRequest($media)
        //       ->each(function ($fileAdder) {
        //           $fileAdder->toMediaCollection('media');
        //     });

        return redirect('course/'.$course->slug.'/'.$lesson->slug);
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

        $notes = Note::where('lesson_id', $lesson->id)->where('user_id', Auth::user()->id)->first();
        $note = '';

        if(! is_null($notes)) {
            $converter = new HtmlConverter();

            $note = $converter->convert($notes->notes);
        }
        
        
        if(Auth::user()->hasRole('admin')) {
            $modules = Module::where('course_id', $lesson->course->id)->with(['less' => function ($query) {
                $query->orderBy('order', 'ASC');
            }])->orderBy('order', 'ASC')->get();

            return view('lesson.show', compact('lesson', 'modules', 'notes', 'note'));
        }

        $modules = Module::where('course_id', $lesson->course_id)->where('active', 1)->with(['less' => function ($query) {
            $query->where('active', '1');
            $query->orderBy('order', 'ASC');
        }])->orderBy('order', 'ASC')->get();

        return view('lesson.show', compact('lesson', 'modules', 'notes'));
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
        $media = $lesson->getMedia('media');

        return view('lesson.edit', compact('lesson', 'modules', 'media'));
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
        $lesson->active = $request->active;
        $lesson->save();

        $course = Course::find($module->course_id);

        if(isset($request->media)) {
            $lesson->addMediaFromRequest('media')->toMediaCollection('media');
        }

        return redirect('course/'.$course->slug.'/'.$lesson->slug);
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
