<?php

namespace DareToConquer\Http\Controllers;

use Illuminate\Http\Request;
use DareToConquer\Youtube;

class YoutubeController extends Controller
{
	public function index()
	{
		$youtubes = Youtube::orderBy('id', 'DESC')->get();

		return view('youtube.index', compact('youtubes'));
	}
	
	public function create()
	{
		return view('youtube.create');
	}

    public function store(Request $request)
    {
    	$youtube = Youtube::create([
    		'title' => $request->title,
    		'youtube_id' => $request->youtube_id
    	]);

    	return redirect('/');
    }
}
