<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\images;
use App\Models\Product;
use App\Models\procat;
use App\Models\sizes;
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
       
        $pro=new Product();
        $pro->name=$request->name;
        $pro->price=$request->price;
        $ab=$pro->description=$request->description;
        // dd($ab);
        $pro->save();
        // $data=$request->all();
        // // dd($data);
        // $create=Product::create($data);

        $last_id=$pro->id;

        //category and product
        $category_id = $request->category_id;
        //  dd($category_id);
        $category=implode(" ",$category_id);
        // dd($category);
        $data = [];
        foreach($category_id as $category) {
            $data[] = [
                'product_id' => $last_id,
                'category_id' => $category
            ];
        }
        procat::insert($data);

        //sizes
        $size= new sizes();
        $size->product_id=$last_id;
        $size->sku=$request->sku;
        $size->size=$request->size;
        $size->save();

        // dd($last_id);
        if($request->hasFile('image'))
        {
            $image_array=$request->file('image');
            $array_len=count($image_array);
            // dd($array_len);
            for($i=0;$i<$array_len;$i++)
            {
                $image_ext=$image_array[$i]->getclientOriginalExtension();
                $new_image_name=rand(1,999999).".".$image_ext;
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
        // $image=images::where('product_id',$id)->get();
        // $product=Product::find($id);
        // $product=procat::find($id);
        // $categories=categories::whereNotNull('category_id')->where('status','1')->get();//subcategories
        // $catego=categories::whereNull('category_id')->where('status','1')->get();//categories
        // return view('product.edit',compact('product','image','categories','catego'));

        $product=Product::with('category')->find($id);
        // dd($product);
        return view('product.edit',compact('product'));
    }



    public function update(Request $request,  $id)
    {

        $input=$request->all();
        $product=Product::find($id);
    // dd($input);
          $product->update($input);
       
        // $ab=$id->name = $request->name;
        // $ab=$id->id = $request->id;
        // dd($ab);
        // $id->price = $request->price;
        // $id->status=$request->status;
        // $id->description = $request->description;
        // $id->category_id = $request->category_id;
        // dd($ab,$bc,$cd,$ef);
        // $id->save();
        // $last_id=$id;
        // dd($last_id);
        if($request->hasFile('image'))
        {
            $image_array=$request->file('image');
            $array_len=count($image_array);
            // dd($array_len);
            for($i=0;$i<$array_len;$i++)
            {
                $image_ext=$image_array[$i]->getclientOriginalExtension();
                $new_image_name=rand(1,999999).".".$image_ext;
                $destination_path=public_path('/uploads');
                $image_array[$i]->move($destination_path,$new_image_name);
                $image=new images();
                $image->image=$new_image_name;
                $image->product_id=$id;
                $image->save();
            }
        }
        return redirect('product');
    
    }

    public function destroy(Product $product)
    {
        //
    }
}
