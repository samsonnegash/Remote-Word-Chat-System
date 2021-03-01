<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VideoController extends Controller
{
    //


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function video()
    {
        return view('RWCSvideo');
    }
    //
}
