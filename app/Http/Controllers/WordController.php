<?php

namespace App\Http\Controllers;

use App\Word;
use Illuminate\Http\Request;

class WordController extends Controller
{

    public function store(Request $request, $setId){
        $word = new Word;
        $word->set_id = $setId;
        $word->word1 = request('newWord1');
        $word->word2 = request('newWord2');
        $word ->save();

        return back();
    }


    public function update(Request $request, $wordId)
    {
            $word = Word::findOrFail($wordId);
            $set = \App\Set::findOrFail($word->set_id);
            if (request('word1') != null)
                $word->word1 = request('word1');
            if (request('word2') != null)
                $word->word2 = request('word2');
            $word ->save();

        return view('set.edit', compact('set'));
    }

     public function destroy($wordId)
     {
             $word = Word::findOrFail($wordId);
             $set = \App\Set::findOrFail($word->set_id);
             $word->delete();

         return view('set.edit', compact('set'));
     }
}
