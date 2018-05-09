<?php

namespace App\Http\Controllers;

use App\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['show','index']);
    }

    public function index()
    {
        $languages = Language::get();
        return view('language.index', compact('languages'));
    }

    public function store(Request $request)
    {
        if (request('name') != null && request('shortcut') != null) {
            $language = new Language;
            $language->name = request('name');
            $language->shortcut = request('shortcut');
            $language ->save();
        }
        return back();
    }

    public function show($languageShortcut)
    {
           $language = Language::where('shortcut',$languageShortcut)->first();
			return view('language.language', compact('language'));
    }

    public function edit($languageShortcut)
    {
           $language = Language::where('shortcut',$languageShortcut)->first();
            return view('language.edit', compact('language'));
    }


     public function update(Request $request, $languageId){
                $language = Language::findOrFail($languageId);
                        if (request('name') != null)
                $language->name = request('name');
                        if (request('shortcut') != null)
                $language->shortcut = request('shortcut');
                $language ->save();

                return back();
        }

     public function destroy($languageId)
     {
             $language = Language::findOrFail($languageId);
             $language->delete();

             return back();
     }

}
