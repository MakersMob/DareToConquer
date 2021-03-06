<?php

namespace DareToConquer\Http\Controllers;

use Illuminate\Http\Request;
use DareToConquer\Course;
use DareToConquer\Module;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Auth;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::guest()) {
            $courses = Course::where('active', 1)->orderBy('order', 'ASC')->get();

            return view('course.index', compact('courses'));
        }

        $user = Auth::user();

        if($user->hasRole('admin')) {
            $courses = Course::orderBy('order', 'ASC')->get();
        } elseif($user->hasRole('gold')) {
            $courses = Course::where('active', 1)->orderBy('order', 'ASC')->get();
        } else {
            $courses = $user->courses;
            $others = Course::where('active', 1)->orderBy('order', 'ASC')->get();
            return view('course.index', compact('courses', 'others'));
        }

        return view('course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('course.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $course = Course::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        return redirect('course/'.$course->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::where('slug', $id)->firstOrFail();

        if(Auth::guest() || (! Auth::user()->courses->contains($course->id) && Auth::user()->hasRole('bronze'))) {
            $modules = Module::where('course_id', $course->id)->where('active', 1)->with(['less' => function ($query) {
                $query->where('active', '1');
                $query->orderBy('order', 'ASC');
            }])->orderBy('order', 'ASC')->get();
            return view('sales.'.$id, compact('course', 'modules'));
        }
        
        $user = Auth::user();

        if($user->hasRole('admin')) {
            $modules = Module::where('course_id', $course->id)->with(['less' => function ($query) {
                $query->orderBy('order', 'ASC');
            }])->orderBy('order', 'ASC')->get();

            return view('course.show', compact('course', 'modules'));
        }
        
        $modules = Module::where('course_id', $course->id)->where('active', 1)->with(['less' => function ($query) {
            $query->where('active', '1');
            $query->orderBy('order', 'ASC');
        }])->orderBy('order', 'ASC')->get();

        return view('course.show', compact('course', 'modules'));
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
