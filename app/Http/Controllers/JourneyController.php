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
    	$journey = Journey::with(['stops' => function ($query) {
            $query->orderBy('order', 'ASC');
        }])->where('slug', $slug)->first();

    	if(Auth::guest()) {
    		return view('sales.journey.'.$slug, compact('journey'));
    	} elseif(Auth::user() && Auth::user()->hasRole('gold')) {
            return view('journey.show', compact('journey'));
        } elseif(Auth::user() && Auth::user()->journeys->contains($journey->id)) {
            return view('journey.show', compact('journey'));
        } else {
            return view('sales.journey.'.$slug, compact('journey'));
        }    	
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
