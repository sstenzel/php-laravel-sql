<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    public function language() {

			return $this->belongsTo(Language::class);
	}
    public function sets() {

            return $this->hasMany(Set::class);
     }

     public function users() {

         return $this->belongsToMany(User::class);
   }
}
