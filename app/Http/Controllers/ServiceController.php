<?php

namespace DareToConquer\Http\Controllers;

use DareToConquer\Service;
use Illuminate\Http\Request;
use Auth;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::orderBy('id', 'DESC')->paginate(50);

        return view('service.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $service = Service::create([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => Auth::user()->id
        ]);

        return redirect('service/'.$service->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \DareToConquer\ServiceController  $serviceController
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = Service::find($id);

        return view('service.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \DareToConquer\ServiceController  $serviceController
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::find($id);

        if(Auth::user()->id == $service->user_id) {
            return view('service.edit', compact('service'));
        }

        return redirect('/service');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \DareToConquer\ServiceController  $serviceController
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $service = Service::find($id);

        $service->name = $request->name;
        $service->description = $request->description;

        $service->save();

        return redirect('service/'.$service->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \DareToConquer\ServiceController  $serviceController
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::find($id);

        if(Auth::user()->id == $service->user_id) {
            $service->delete();
        }

        return redirect('service');
    }
}
