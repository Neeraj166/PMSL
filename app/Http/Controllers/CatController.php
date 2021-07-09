<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\Product;
use Illuminate\Http\Request;

class CatController extends Controller
{
    public function index()
    {
        $catego=categories::whereNULL('category_id')->get();
        $subcatego=categories::whereNOTNULL('category_id')->get();
        return view('cat.showcat',compact('catego','subcatego'));
    }
    public function create()
    {
        $catego=categories::whereNull('category_id')->get();
        return view('cat.addcat',compact('catego'));
    }
    public function save(Request $request)
    {
        $cat=new categories();
        $ab=$cat->category_id=$request->category_id;
        $bc=$cat->cat_name=$request->cat_name;
       
        $cat->save();
        return redirect('/showcat');
    }


    public function edit($id)
    {
        $category=categories::find($id);
        return view('cat.editcat',compact('category'));
    }

    public function update(Request $request ,categories  $id)
    {
        $this->validate($request, [
            'cat_name' => 'required',
            'status'=>'required'
        ]);
        $ab=$id->cat_name = $request->cat_name;
        $bc=$id->status = $request->status;
        // dd($bc);
        $id->save();
        return redirect('/showcat');  
        }

        public function dashboard()
        {
            $catego=categories::whereNULL('category_id')->where('status','1')->get();
            $subcat=categories::whereNOTNULL('category_id')->where('status','1')->get();
            $product=Product::where('status','1')->get();
        return view('dashboard',compact('catego','product','subcat'));
        }
        public function categorymenu($id)
    {
        $category=categories::with(['getproduct' => function ($getproduct) {
            $getproduct->where('status', '1');
        }])->where('category_id',$id)->where('status','1')->get();
        // dd($category);
        $subcat=categories::where('category_id',$id)->where('status','1')->get();
        // dd($subcat);
        return view('list',compact('category','subcat'));
    }

    public function subcategorymenu($id)
    {
        $category=categories::with(['getproduct' => function ($getproduct) {
            $getproduct->where('status', '1');
        }])->where('id',$id)->where('status','1')->get();
        // dd($category);
        return view('listproduct',compact('category'));
    }
}