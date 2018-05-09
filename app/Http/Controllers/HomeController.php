<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class HomeController extends Controller
{

    public function home()
    {
        $languages = \App\Language::get();
        return view('home', compact('languages'));
    }
}
