<?php

namespace App\Http\Controllers;

use App\subcategory_user;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SubcategoryUserController extends Controller
{

     public function store(Request $request)
     {

         $user = User::findOrFail(request('userId'));
         $user->subcategories()->attach(request('subcategoryId'));

         return back();
     }


    public function destroy($userId, $subcategoryId)
    {

        $user = User::findOrFail($userId);
        $user->subcategories()->detach($subcategoryId);

        return back();
    }
}
