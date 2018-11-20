<?php

namespace DareToConquer\Http\Controllers;

use Illuminate\Http\Request;
use DareToConquer\Niche;
use DareToConquer\Exchange;

class ExchangeNicheController extends Controller
{
    public function show($niche)
    {
    	$niche = Niche::where('slug', $niche)->first();
    	$niches = Niche::orderBy('name', 'ASC')->get();

    	$exchanges = Exchange::where('status', 1)->orderBy('created_at', 'DESC')->where('niche_id', $niche->id)->paginate(20);

    	return view('exchange.niche.show', compact('exchanges', 'niches', 'niche'));
    }
}
