<?php

namespace DareToConquer\Http\Controllers;

use Illuminate\Http\Request;
use DareToConquer\Stop;
use DareToConquer\Journey;
use Auth;

class StopCompletedController extends Controller
{
    public function store($id)
    {
    	Auth::user()->stops()->attach($id);

    	$stop = Stop::find($id);
    	$journey = Journey::find($stop->journey_id);

    	$order = $stop->order + 1;
        
        if(Auth::user()->hasRole('admin')) {
            $next_stop = Stop::where('order', $order)->where('journey_id', $journey->id)->first();
            if($next_stop) {
                return redirect('journey/'.$journey->slug.'/'.$next_stop->slug);
            }

            return redirect('/journey');
        }
    	
        $next_stop = Stop::where('order', $order)->where('active', 1)->where('journey_id', $journey->id)->first();

        if($next_stop) {
            return redirect('journey/'.$journey->slug.'/'.$next_stop->slug);
        }

    	return redirect('/journey');
    }
}
