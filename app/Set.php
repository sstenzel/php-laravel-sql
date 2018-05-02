<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Set extends Model
{
    public function subcategory() {

            return $this->belongsTo(Subcategory::class);
    }
    public function words() {

            return $this->hasMany(Words::class);

     }
}
