<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    public function subcategories() {

			return $this->hasMany(Subcategory::class);
	 }
}
