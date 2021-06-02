<?php

namespace App\Http\Controllers;
use App\Models\categories;
use App\Models\SubCategories;
use Illuminate\Http\Request;

class SubCatController extends Controller
{
    public function create()
    {
        $category=categories::all();
        return view('subcat/addsubcat',compact('category'));
    }

    public function save(Request $request)
    {
       
        $cat= new SubCategories();

        $ab= $cat->cat_id=$request->id;
        // dd($ab);
        $bc=$cat->sub_cat_name=$request->name;
        // dd($bc);

        $cat->save();
    
    }
}
