<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Subcategory extends Model
{
    public function language() {

			return $this->belongsTo(Language::class);
	}
    public function sets() {

            return $this->hasMany(Set::class);
     }
     public function users() {      // have permission for category

         return $this->belongsToMany(User::class);
   }

     public function setsToEdit($user) {

             if( $this->editPermission($user) )
                return  $this->sets;

             return  $this->sets->where('user_id', $user->id);
      }

      public function setsToShow($user) {
              if ($user == null)
                    return  $this->sets->where('private',false);

             if( $this->editPermission($user) )
                    return  $this->sets;

            return DB::table('sets')
                   ->where('user_id', $user->id)
                   ->where('subcategory_id', $this->id)
                   ->orWhere('private',false)
                   ->where('subcategory_id', $this->id)
                   ->get();
       }

       public function publicSetPermission($user) {
                if( $user->isAdmin() )
                        return true;
                if( $user->isSuperEditor() && $user->subcategoryPermission($this))
                        return true;
             if( $user->isEditor() && $user->subcategoryPermission($this))
                        return true;
                return false;
          }

   public function editPermission($user) {
        if( $user->isAdmin() )
                return true;

        if( $user->isSuperEditor() && $user->subcategoryPermission($this))
            return true;

       return false;
   }


   public static function getSubcategory($languageShortcut, $subcategoryName)
   {
       $language = \App\Language::where('shortcut',$languageShortcut)->first();
       $subcategory = $language->subcategories()->where('name',$subcategoryName)->first();
        return $subcategory;
   }
}
