<?php

namespace DareToConquer\Http\Controllers;

use Illuminate\Http\Request;
use DareToConquer\Journey;
use Auth;

class JourneyController extends Controller
{
	public function index()
	{
		$journeys = Journey::get();

		return view('journey.index', compact('journeys'));
	}
    public function create()
    {
    	return view('journey.create');
    }

    public function store(Request $request)
    {
        $journey = Journey::create([
            'slug' => $request->slug,
            'summary' => $request->summary,
            'price' => $request->price,
            'title' => $request->title,
            'seo_title' => $request->seo_title,
            'description' => $request->description
        ]);

        return redirect('journey/'.$journey->slug);
    }

    public function show($slug)
    {
    	$journey = Journey::where('slug', $slug)->first();

    	if(Auth::guest()) {
    		return view('sales.journey.'.$slug, compact('journey'));
    	}
    	
    	return view('journey.show', compact('journey'));
    }

    public function edit($id)
    {
    	$journey = Journey::find($id);

    	return view('journey.edit', compact('journey'));
    }

    public function update(Request $request, $id)
    {

    }
}
