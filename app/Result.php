<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Result extends Model
{
    public function user() {

            return $this->belongsTo(User::class);
    }
    public function set() {

            return $this->belongsTo(Set::class);
    }

    public static function add($set, $result)
    {
        $new = new Result;
        $new->user_id = Auth::id();
        $new->percentage = $result;
        $new->set_id = $set->id;
        $new ->save();
    }

}
