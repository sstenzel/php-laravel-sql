<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    public function subcategories() {

			return $this->hasMany(Subcategory::class);
	 }

     public function getSubcategories() {

             return $this->subcategories;
      }

     public function editPermission($user) { // ale wystarczy isAdmin
           if( $user->isAdmin())
                   return true;

           return false;
     }

}
