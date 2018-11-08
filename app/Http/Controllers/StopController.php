<?php

namespace DareToConquer\Http\Controllers;

use Illuminate\Http\Request;
use DareToConquer\Journey;
use DareToConquer\Stop;

class StopController extends Controller
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
        $journeys = Journey::orderBy('id', 'DESC')->get();

        return view('stop.create', compact('journeys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $journey = Journey::find($request->journey_id);

        $order = 1;

        $last_stop = Stop::where('journey_id', $journey->id)->get();
        $l = $last_stop->last();
        if($l) {
            $order = $l->order + 1;
        }

        $stop = Stop::create([
            'name' => $request->name,
            'journey_id' => $request->journey_id,
            'active' => $request->active,
            'content' => $request->content,
            'order' => $order
        ]);

        return redirect('journey/'.$journey->slug.'/'.$stop->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($journey, $stop)
    {
        $journey = Journey::where('slug', $journey)->first();

        $stop = Stop::where('slug', $stop)->first();

        return view('stop.show', compact('journey', 'stop'));
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
