<?php

namespace App\Http\Controllers;

use App\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['show','back']);
    }

    public function store(Request $request, $languageId)
    {
            if (request('name') != null) {
                $subcategory = new Subcategory;
                $subcategory->name = request('name');
                $subcategory->language_id = $languageId;
                $subcategory ->save();
            }

        return back();
    }


    public function show($languageShortcut, $subcategoryName)
    {
        $subcategory = Subcategory::getSubcategory($languageShortcut, $subcategoryName);
        return view('subcategory.subcategory', compact('subcategory'));
    }


    public function edit($languageShortcut, $subcategoryName)
    {
            $subcategory = Subcategory::getSubcategory($languageShortcut, $subcategoryName);
            return view('subcategory.edit', compact('subcategory'));
    }


    public function update(Request $request, $subcategoryId){
               $subcategory = Subcategory::findOrFail($subcategoryId);
                if (request('name') != null) {
                   $subcategory->name = request('name');
                   $subcategory ->save();
                }
           return view('subcategory.edit', compact('subcategory'));
       }


    public function destroy($subcategoryId)
    {
            $subcategory = Subcategory::findOrFail($subcategoryId);
            $subcategory->delete();

            return back();
    }

    public function back(Subcategory $subcategory)
    {
            $language =$subcategory->language;
            return view('language.language', compact('language'));
    }

}
