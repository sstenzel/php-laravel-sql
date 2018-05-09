<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Set extends Model
{

	protected $guarded = ['id' ];

    public function subcategory() {

            return $this->belongsTo(Subcategory::class);
    }

	public function author() {

            return $this->belongsTo(User::class);
    }

    public function words() {

            return $this->hasMany(Word::class);
     }

     public function languageName() {
             return $this->subcategory->language->name;
      }

	  public function language() {
			  return $this->subcategory->language;
	   }

      public function editPermission($user) {
            if( $user == $this->author)
                return true;
            if( $user->isAdmin() )
                    return true;
            if( $user->isSuperEditor() && $user->subcategoryPermission($this->subcategory))
                    return true;
            return false;
      }

	  public static function getSet($languageShortcut, $subcategoryName, $setName) {
		  $language = \App\Language::where('shortcut',$languageShortcut)->first();
		  $subcategory = $language->subcategories()->where('name',$subcategoryName)->first();
		  $set = $subcategory->sets()->where('name',$setName)->first();

		  return $set;
	  }

	  public static function getShuffledSet (Set $set)
	  {
		  $shuffledSet = array();
		  foreach($set->words as $word) {
			  $shuffledSet = array_add($shuffledSet, $word->word1,  $word->word2);
		  }
		  return array_shuffle($shuffledSet, null);
	  }
}
