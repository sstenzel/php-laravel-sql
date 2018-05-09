<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user =  \App\User::findOrFail(Auth::id());
        $results = $user->results;

        return view('user/index', ['results' => $results]);
    }

    public function users()
    {
        $users=  \App\User::all();
        $roles= \App\Role::all();
        return view('user/users', ['users' => $users,
                'roles' => $roles]);
    }

    public function userDestroy($userId)
    {
            $user = User::findOrFail($userId);
            $user->delete();

            return back();
    }

    public function userEdit(Request $request, $userId)
    {
            if (request('email') != null && request('role_id') != null) {
            $user = User::findOrFail($userId);
            $user->email = request('email');
            $user->role_id = request('role_id');
            $user ->save();
            }
            return back();
    }

    public function languages()
    {
        $languages = \App\Language::all();
        return view('user/languages',  compact('languages'));
    }

    public function permissions()
    {
        $users =  User::all();
        $languages = \App\Language::all();
        return view('user/permissions',  ['users' => $users,
                'languages' => $languages]);
    }

}
