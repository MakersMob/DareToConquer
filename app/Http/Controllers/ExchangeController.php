<?php

namespace DareToConquer\Http\Controllers;

use Illuminate\Http\Request;
use DareToConquer\Exchange;
use DareToConquer\Niche;
use Auth;
use League\HTMLToMarkdown\HtmlConverter;

class ExchangeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('index', 'create', 'store', 'edit', 'update');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exchanges = Exchange::where('status', 1)->orderBy('created_at', 'DESC')->simplePaginate(20);

        $niches = Niche::orderBy('name', 'ASC')->get();

        return view('exchange.index', compact('exchanges', 'niches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $niches = Niche::orderBy('name', 'ASC')->get();
        return view('exchange.create', compact('niches'));
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

        $exchange = Exchange::create([
            'user_id' => Auth::user()->id,
            'url' => $url,
            'niche_id' => $request->niche,
            'type' => $request->type,
            'description' => $request->description,
            'status' => 1,
        ]);

        $user = Auth::user();
        $user->points = $user->points - 4;
        $user->save();

        return redirect('/exchange/'.$exchange->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $exchange = Exchange::find($id);

        $exchanges = Exchange::orderBy('created_at', 'DESC')->get();

        return view('exchange.show', compact('exchange', 'exchanges'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $exchange = Exchange::find($id);

        if(Auth::user()->id == $exchange->user_id) {
            $converter = new HtmlConverter;
            $description = $converter->convert($exchange->description);
            return view('exchange.edit', compact('exchange', 'description'));
        }

        return back();
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
        $exchange = Exchange::find($id);

        $exchange->type = $request->type;
        $exchange->url = $request->url;
        $exchange->description = $request->description;

        $exchange->save();

        return redirect('exchange/'.$exchange->id);
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

    public function close($id)
    {
        $exchange = Exchange::find($id);

        $exchange->status = 0;
        $exchange->save();

        return redirect('exchange');
    }
}
