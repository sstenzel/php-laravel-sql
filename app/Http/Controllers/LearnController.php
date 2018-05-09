<?php

namespace App\Http\Controllers;

use App\Set;
use App\Learn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LearnController extends Controller
{
    public function index($languageShortcut, $subcategoryName, $setName)
    {
        $set = Set::getSet($languageShortcut, $subcategoryName, $setName);
        return view('set.learnIndex', compact('set'));
    }

    public function learn(Request $request, Set $set)
    {
        Learn::clearSession();

        session()->put('toForeign', request('toForeign'));
        session()->put('repeat',  request('repeat'));

        if (session('toForeign') == 1){
            session()->put('lang1', 'Polski');
            session()->put('lang2',  $set->languageName());
        }else{
            session()->put('lang1',  $set->languageName());
            session()->put('lang2',  'Polski');
        }

        $shuffledSet = Learn::getShuffledSet($set);
        session()->put('shuffledSet',  $shuffledSet);

        // $wiadomosc = session('toForeign');
        // return view('layouts.blank', ['wiadomosc' => $wiadomosc, 'shuffledSet' => $shuffledSet]);
    return view('set.learn', ['set' => $set, 'shuffledSet' => session('shuffledSet'), 'lang1' => session('lang1'), 'lang2' => session('lang2'), 'toForeign' => session('toForeign'), 'answersEnabled' => 0 ]);
 }


    public function check(Request $request, Set $set)
    {
       $shuffledSet = session('shuffledSet');
        if (! session('repeat')==1){
            $answersEnabled = true;
        } else {
            if (Learn::incorrectSet($request, $shuffledSet)) {

                $shuffledSet = Learn::shuffleArray(session()->pull('shuffledSet'));
                session()->put('shuffledSet',  $shuffledSet);
                $answersEnabled = false;
            } else {
                $answersEnabled = true;
            }
        }
        return view('set.learn', ['set' => $set, 'shuffledSet' => session('shuffledSet'), 'lang1' => session('lang1'), 'lang2' => session('lang2'), 'toForeign' => session('toForeign'), 'answersEnabled' => $answersEnabled ]);
    }

    public function testIndex($languageShortcut, $subcategoryName, $setName)
    {
        $set = Set::getSet($languageShortcut, $subcategoryName, $setName);
        return view('set.testIndex', compact('set'));
    }

    public function testStart(Request $request, Set $set)
    {
        Learn::clearSession();
        session()->put('toForeign', request('toForeign'));

        if (session('toForeign') == 1){
            session()->put('lang1', 'Polski');
            session()->put('lang2',  $set->languageName());
        }else{
            session()->put('lang1',  $set->languageName());
            session()->put('lang2',  'Polski');
        }

        $shuffledSet = Learn::getShuffledSet($set);
        session()->put('shuffledSet',  $shuffledSet);

        return view('set.test', ['set' => $set, 'shuffledSet' => session('shuffledSet'), 'lang1' => session('lang1'), 'lang2' => session('lang2'), 'toForeign' => session('toForeign'), 'answersEnabled' => 0, 'result' => 0]);
    }

    public function testResult(Request $request, Set $set)
    {
            $shuffledSet = Learn::getShuffledSet($set);
            $result = Learn::checkTest($request, $shuffledSet);

            if(!Auth::guest()) {
                \App\Result::add($set, $result);
            }

            return view('set.test', ['set' => $set, 'shuffledSet' => session('shuffledSet'), 'lang1' => session('lang1'), 'lang2' => session('lang2'), 'toForeign' => session('toForeign'), 'answersEnabled' => 1, 'result' => $result]);
    }
}
