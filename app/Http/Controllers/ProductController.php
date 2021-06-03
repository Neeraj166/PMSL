<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\images;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function index()
    {
        $product=Product::get();
        $image=images::get();
        return view('product.display',compact('product','image'));
    }

   
    public function create()
    {
        $categories=categories::whereNotNull('category_id')->where('status','1')->get();
        $catego=categories::whereNull('category_id')->where('status','1')->get();

        return view('product.add',compact('categories','catego'));
    }


    public function store(Request $request)
    {
        // $data= array(
        //     'name'=>$request->name,
        //     'category_id'=>$request->category_id,
        //     'price'=>$request->price,
        //     'description'=>$request->description,
        // );
        $data=$request->all();
        // dd($data);
        $create=Product::create($data);
        $last_id=$create->id;
        // dd($last_id);
        if($request->hasFile('image'))
        {
            $image_array=$request->file('image');
            $array_len=count($image_array);
            // dd($array_len);
            for($i=0;$i<$array_len;$i++)
            {
                $image_ext=$image_array[$i]->getclientOriginalExtension();
                $new_image_name='uploads/'.rand(1,999999).".".$image_ext;
                $destination_path=public_path('/uploads');
                $image_array[$i]->move($destination_path,$new_image_name);
                $image=new images();
                $image->image=$new_image_name;
                $image->product_id=$last_id;
                $image->save();
            }
        }
        return  redirect('product');
    }

    public function edit($id)
    {
        $image=images::where('product_id',$id)->get();
        // dd($image);
        $product=Product::find($id);
        return view('product.edit',compact('product','image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
