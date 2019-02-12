<?php

namespace DareToConquer\Http\Controllers;

use Illuminate\Http\Request;
use DareToConquer\Framework;
use DareToConquer\Section;

class FrameworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Section::with('frameworks')->orderBy('id', 'ASC')->get();

        return view('framework.index', compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sections = Section::get();

        return view('framework.create', compact('sections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = 1;

        $frame = Framework::orderBy('order', 'DESC')->get();
        $f = $frame->last();
        if($f) {
            $order = $f->order + 1;
        }

        $framework = Framework::create([
            'title' => $request->title,
            'seo_title' => $request->seo_title,
            'summary' => $request->summary,
            'slug' => $request->slug,
            'content' => $request->content,
            'order' => $order,
            'active' => $request->active,
            'section_id' => $request->section_id
        ]);

        return redirect('framework/'.$framework->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $framework = Framework::where('slug', $id)->first();

        $frameworks = Framework::get();

        $sections = Section::with('frameworks')->orderBy('id', 'ASC')->get();

        return view('framework.show', compact('framework', 'frameworks', 'sections'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $framework = Framework::find($id);
        $sections = Section::get();

        return view('framework.edit', compact('framework', 'sections'));
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
        $framework = Framework::find($id);

        $framework->slug = $request->slug;
        $framework->order = $request->order;
        $framework->active = $request->active;
        $framework->content = $request->content;
        $framework->summary = $request->summary;
        $framework->title = $request->title;
        $framework->seo_title = $request->seo_title;
        $framework->section_id = $request->section_id;

        $framework->save();

        return redirect('framework/'.$framework->slug);
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
