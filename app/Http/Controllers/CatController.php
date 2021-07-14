<?php 

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\Product;
use App\Models\procat;
use Illuminate\Http\Request;

class CatController extends Controller
{
    public function dashboard()
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

        public function index()
        {
            $catego=categories::whereNULL('category_id')->where('status','1')->get();
            $subcat=categories::whereNOTNULL('category_id')->where('status','1')->get();
            $product=Product::with('getcategory')->with('getimage')->where('status','1')->get();
            
            // $ab=categories::whereNULL('category_id')->where('status','1')->get('id')->toarray();
            // // dd($ab);   
            // $bc=categories::where('category_id',NULL)->with(['getsubcategory'=>function($getsubcategory){
            //     $getsubcategory->where('status','1')->get('id');}])->where('status','1')->get();
            //     $datacat=[];
            //     dd($bc);
            //     foreach($bc as $saved)
            //     {
            //         // var_dump ($save);
            //         $datacat=array_merge_recursive($datacat,$saved);   
            //     }     
            //     $databcat=array_reduce($datacat,'array_merge',array());
            //     dd($datacat);
        return view('dashboard',compact('catego','product','subcat'));
        }

        public function categorymenu($id)
    {
        $subcat=categories::where('category_id',$id)->where('status','1')->get('id')->toarray();
        $cat_id=[];
        foreach($subcat as $b){
            $cat_id=array_merge_recursive($cat_id,$b);
        }
        $c=[]; 
        // dd($cat_id);
        foreach ($cat_id as $a)
        {
            foreach ($a as $b)
            {
                $c[]=$b;
            }
        }
        // dd($c);
        $e=[];
        foreach($c as $d)
        {
            $e[]=procat::where('category_id',$d)->get('product_id')->toarray();
        }
        // dd($e);
        $f=[];
        foreach ($e as $g)
        {
            foreach ($g as $h)
            {
                $f=array_merge_recursive($h,$f);
            }
        }
        $fg=[];
        foreach($f as $z)
         {
            $fg=$z;  
        }
        $fh= array_unique($fg);
        // dd($fh);

        $product=[];
        foreach($fh as $i)
        {$this->i=$i;
            $product[]=Product::where('status',1)->with('getimage')->where('id',$i)->get('name');
        }
        // dd($product);
        return view('list',compact('product'));
        // $product=categories::
        // with(['getsubcategory'=>function($getsubcategory)
        //     {  
        //          $getsubcategory->where('status','1')->where('category_id',$this->id)->
        //         with('getproduct', function($getproduct){
        //             $getproduct->where('status','1');
        //         });
        //     }])
        // ->where('status','1')->where('category_id',NULL)->get();
          
    }

    public function subcategorymenu($id)
    {   
        $status=categories::find($id);
        if($status->status =='1'){
            $category=categories::with(['getproduct'=> function ($getproduct) {
            $getproduct->where('status', '1');
            }])->where('id',$id)->where('status','1')->get();
            // dd($category);
            return view('listproduct',compact('category'));
    }
    echo'Could not find item...';}
}