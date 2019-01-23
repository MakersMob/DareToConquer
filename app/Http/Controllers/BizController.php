<?php

namespace DareToConquer\Http\Controllers;

use Illuminate\Http\Request;
use DareToConquer\Biz;
use DareToConquer\User;
use DareToConquer\Niche;
use Auth;
use Feeds;
use View;
use League\HTMLToMarkdown\HtmlConverter;

class bizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$pros = User::where('pro', 1)->get();
        $bizs = Biz::orderBy('id', 'DESC')->simplePaginate(20);

        return view('biz.index', compact('bizs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $niches = Niche::orderBy('name', 'asc')->get();
        return view('biz.create', compact('niches'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        // Make sure http or https is present in URL
        $url = $request->url;
        $url_http = strpos($url, 'http://');
        $url_https = strpos($url, 'https://');
        if ( $url_http === false && $url_https === false) {
            $url = 'http://'.$url;
        }

        $guest_post = 0;
        if(isset($request->guest_post)) $guest_post = 1;

        $biz = Biz::create([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'url' => $url,
            'pinterest' => $request->pinterest,
            'twitter' => $request->twitter,
            'facebok' => $request->facebook,
            'instagram' => $request->instagram,
            'description' => $request->description,
            'guest_post' => $guest_post,
            'guest_post_description' => $request->guest_post_description,
            'feed' => $request->feed,
        ]);

        if(! is_null($request->niches)) {
            foreach($request->niches as $niche) {
                $biz->niches()->attach($niche);
            }
        }

        return redirect('directory/'.$biz->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $biz = Biz::find($id);
        //$reports = Report::where('biz_id', $biz->id)->orderBy('income_date', 'ASC')->get();
        $total = 0;
        $data = '';
        $items = '';
        if($biz->feed) {
            $feed = Feeds::make([$biz->feed], 10);
            $data = array(
                'title'     => $feed->get_title(),
                'permalink' => $feed->get_permalink(),
                'items'     => $feed->get_items(),
            );
            $items = $data['items'];
        } 

        // if(count($reports) > 0) {
        //     $total = Report::where('biz_id', $biz->id)->sum('revenue');
        // }

    return View::make('biz.show', ['biz' => $biz]);
        //return View::make('biz.show', $biz, $reports, $total, $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $biz = Biz::find($id);
        $niches = Niche::orderBy('name', 'asc')->get();

        if(Auth::user()->id == $biz->user_id) {
            $converter = new HtmlConverter;
            $description = $converter->convert($biz->description);
            $guest_post_description = $converter->convert($biz->guest_post_description);
            return view('biz.edit', compact('biz', 'description', 'guest_post_description', 'niches'));
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
        //dd($request);
        $biz = Biz::find($id);

        $biz->name = $request->name;
        $biz->url = $request->url;
        $biz->pinterest = $request->pinterest;
        $biz->twitter = $request->twitter;
        $biz->facebook = $request->facebook;
        $biz->instagram = $request->instagram;
        $biz->description = $request->description;
        $biz->feed = $request->feed;
        $guest_post = 0;
        if($request->guest_post == 1) $guest_post = 1;
        $biz->guest_post = $guest_post;
        $biz->guest_post_description = $request->guest_post_description;

        $biz->save();

        if(! is_null($request->niches)) {
            foreach($request->niches as $niche) {
                if(! $biz->niches->contains($niche)) {
                    $biz->niches()->attach($niche);
                }
            }
        }

        return redirect('/directory/'.$biz->id);
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