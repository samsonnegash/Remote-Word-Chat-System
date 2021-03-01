<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalenderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function calendar()
    {
        return view('calendar');
    }


    //
}
