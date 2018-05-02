<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Words extends Model
{
    public function set() {

            return $this->belongsTo(Set::class);
    }
}
