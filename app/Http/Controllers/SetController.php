<?php

namespace App\Http\Controllers;

use App\Set;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class SetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['show','back']);
    }


    public function store(Request $request, $subcategoryId)
    {
        if (request('name') != null) {
        $set = new Set;
        $set->name = request('name');
        if (request('private') != null)
        $set->private= request('private');
        $set->user_id = Auth::id();
        $set->subcategory_id = $subcategoryId;
        $set ->save();
        }
        return back();
    }


    public function show($languageShortcut, $subcategoryName, $setName)
    {
        $set = Set::getSet($languageShortcut, $subcategoryName, $setName);
        return view('set.set', compact('set'));
    }

    public function edit($languageShortcut, $subcategoryName, $setName) {
            $set = Set::getSet($languageShortcut, $subcategoryName, $setName);
            return view('set.edit', compact('set'));
    }



 public function update(Request $request, $setId){
            $set = Set::findOrFail($setId);
            if (request('name') != null) {
                $set->name = request('name');
                $set ->save();
            }
        return view('set.edit', compact('set'));
    }

    public function destroy($setId)
    {
            $set = Set::findOrFail($setId);
            $set->delete();

        return back();
    }

    public function test($languageShortcut, $subcategoryName, $setName) {
            $set = $this->getSet($languageShortcut, $subcategoryName, $setName);
            return view('set.test', compact('set'));
    }

    public function back(Set $set)
    {
            $subcategory =  $set->subcategory;

            return view('subcategory.subcategory', compact('subcategory'));
    }

}
