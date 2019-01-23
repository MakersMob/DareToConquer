<?php

namespace DareToConquer\Http\Controllers;

use Illuminate\Http\Request;
use DareToConquer\Biz;

class GuestPostController extends Controller
{
    public function index()
    {
        $bizs = Biz::where('guest_post', 1)->orderBy('id', 'DESC')->get();

        return view('guestpost.index', compact('bizs'));
    }
}
