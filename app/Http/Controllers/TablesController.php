<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TablesController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function tables()
    {
        return view('tables');
    }
    //
}
