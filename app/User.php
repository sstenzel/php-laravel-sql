<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
//-------------------------------------------

    public function role() {

            return $this->belongsTo(Role::class);
    }

    public function sets() {

            return $this->hasMany(Set::class);
     }

     public function results() {

             return $this->hasMany(Result::class);
      }

    public function subcategories() {

        return $this->belongsToMany(Subcategory::class);
    }

    public function getSubcategories() {

        return $this->subcategories;
    }

    public function subcategoryPermission($subcategory) {
            if (DB::table('subcategory_user')->where('user_id', $this->id)->where('subcategory_id', $subcategory->id)->first()  != null)
                return true;
            return false;
    }

  public function isAdmin() {

          if( $this->role == Role::where('name', 'admin')->first())
            return true;
        return false;
   }

   public function isSuperEditor() {

       if( $this->role == Role::where('name', 'supereditor')->first())
            return true;
        return false;
    }

    public function isEditor() {

             if( $this->role == Role::where('name', 'editor')->first())
                    return true;
            return false;
     }

}
