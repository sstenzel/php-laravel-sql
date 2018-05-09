<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class HomeController extends Controller
{

    public function __construct()
    {
    //    $this->middleware('auth')->except('index');
    }


    public function home()
    {
        $languages = \App\Language::get();
        return view('home', compact('languages'));
    }
}
