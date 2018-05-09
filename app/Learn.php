<?php

namespace App;

use App\Learn;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Learn extends Model
{
    public static function getShuffledSet($set)
    {
        $array = array();
        if (session('toForeign') == 1){
            foreach($set->words as $word)
                $array = array_add($array, $word->word1,  $word->word2);
        }else{
            foreach($set->words as $word)
                $array = array_add($array, $word->word2,  $word->word1);
        }
        return Learn::shuffleArray($array);
    }

    public static function shuffleArray ($array)
    {
        $shuffledSet = array();
        while ($array != null) {
            $key = array_rand($array);
            $value = array_pull($array, $key);
            $shuffledSet = array_add($shuffledSet, $key, $value);
        }
        return $shuffledSet;
    }

    public static function incorrectSet($request, $shuffledSet){
            foreach($shuffledSet as $word1 => $word2) {
                if (request($word1) != $word2 )
                    return true;
            }
            return false;
    }

    public static function checkTest($request, $shuffledSet){
            $correct = 0;
            $wordCount = 0;
            foreach($shuffledSet as $word1 => $word2) {
                $wordCount++;
                if (request($word1) == $word2 )
                    $correct++;
            }
            if ($wordCount != 0)
                return number_format($correct/$wordCount, 2, '.', ',');
            return 0;
    }

    public static function clearSession() {
        session()->pull('toForeign');
        session()->pull('repeat');
        session()->pull('lang1');
        session()->pull('lang2');
        session()->pull('shuffledSet');
    }
}
