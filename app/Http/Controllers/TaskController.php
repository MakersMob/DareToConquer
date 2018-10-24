<?php

namespace DareToConquer\Http\Controllers;

use Illuminate\Http\Request;
use DareToConquer\Task;
use DareToConquer\Mail\TaskCompleted;
use Illuminate\Support\Facades\Mail;
use Auth;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('create', 'store', 'show', 'index');
    }
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Make sure http or https is present in URL
        $url = $request->url;
        $url_http = strpos($url, 'http://');
        $url_https = strpos($url, 'https://');
        if ( $url_http === false && $url_https === false) {
            $url = 'http://'.$url;
        }

        $task = Task::Create([
            'user_id' => Auth::user()->id,
            'exchange_id' => $request->exchange_id,
            'url' => $url,
            'comment' => $request->comment
        ]);

        $user = $task->exchange->user;
        $tasker = Auth::user();
        $exchange = $task->exchange;

        Mail::to($user)->send(new TaskCompleted($user, $tasker, $task, $exchange));

        return redirect('/exchange/'.$task->exchange_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::find($id);
        if(Auth::user()->id != $task->exchange->user_id) {
            return redirect('exchange');
        }
        return view('task/show', compact('task'));
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
