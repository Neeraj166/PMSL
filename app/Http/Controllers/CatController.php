<?php

namespace App\Http\Controllers;

use App\Models\categories;
use Illuminate\Http\Request;

class CatController extends Controller
{
    public function create()
    {
        return view('cat.addcat');
    }
    public function save()
    {
        // $faculty= new Faculties();
        // $faculty->faculty=request('faculty');
        // $faculty->save();
        // return redirect('/faculty');
        $cat= new categories();
        $cat->cat_name=request('name');
        $cat->save();
        return redirect('/showcat');
    }

    public function show()
    {
        $abc=categories::all();
        return view('cat.showcat',compact('abc'));    
    }

    // public function delete($id)
    // {
    // 	$cat=categories::find ($id);
    //  $cat->delete();
    //  return redirect('/showcat');
// }
}
