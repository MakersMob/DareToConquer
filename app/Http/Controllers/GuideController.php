<?php

namespace DareToConquer\Http\Controllers;

use Illuminate\Http\Request;
use DareToConquer\Guide;
use Auth;

class GuideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user() && Auth::user()->hasRole('admin')) {
            $guides = Guide::get();
        } else {
            $guides = Guide::where('active', 1)->get();
        }
        

        return view('guide.index', compact('guides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('guide.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $guide = Guide::create([
            'title' => $request->title,
            'seo_title' => $request->seo_title,
            'summary' => $request->summary,
            'slug' => $request->slug,
            'content' => $request->content
        ]);

        if(isset($request->media)) {
            $guide->addMediaFromRequest('media')->toMediaCollection('media');
        }

        return redirect('/guide/'.$guide->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $guide = Guide::where('slug', $id)->first();

        return view('guide.show', compact('guide'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $guide = Guide::find($id);
        $media = $guide->getMedia('media');

        return view('guide.edit', compact('guide', 'media'));
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
        $guide = Guide::find($id);

        $guide->title = $request->title;
        $guide->seo_title = $request->title;
        $guide->summary = $request->summary;
        $guide->content = $request->content;
        $guide->slug = $request->slug;
        $guide->active = $request->active;

        $guide->save();

        if(isset($request->media)) {
            $guide->addMediaFromRequest('media')->toMediaCollection('media');
        }

        return redirect('/guide/'.$guide->slug);
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
