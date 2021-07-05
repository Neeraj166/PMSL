<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\images;
use App\Models\Product;
use App\Models\procat;
use App\Models\sizes;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        //sizes
        $size= new sizes();
        $size->product_id=$last_id;
        $sku=$size->sku=$request->sku;
        if(sizes::where('sku',$sku)->exists()){
            product::where('id',$last_id)->delete();
            echo'SKU already exist, Please enter valid SKU';
        }
        else
        { 
        $size->size=$request->size;$size->save();
        //category and product
        $category_id = $request->category_id;
        //  dd($category_id);
        $data = [];
        foreach($category_id as $category) {
            $data[] = [
                'product_id' => $last_id,
                'category_id' => $category
            ];
        }
        procat::insert($data);

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
    }}

    public function edit($id)
    {
        // $image=images::where('product_id',$id)->get();
        // $product=Product::find($id);
        $subcat=categories::whereNotNull('category_id')->get();//subcategories
        $category=categories::whereNull('category_id')->get();//categories
        // return view('product.edit',compact('product','image','categories','catego'));
        $product=Product::with('getcategory')->with('getimage')->with('getsize')->find($id);
        // dd($subcat);
        return view('product.edit',compact('category','subcat','product'));
    }

    public function update(Request $request,  $id)
    {
        //product table
        $input=$request->all();
        $product=Product::find($id);
        $product->update($input);

        //image table
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

        //category
        $category_id = $request->category_id;
        // dd($category_id);
        $savedcat_id=procat::where('product_id',$id)->get('category_id')->toarray();
        $datacat=[];
        foreach($savedcat_id as $saved)
        {
            // var_dump ($save);
            $datacat=array_merge_recursive($datacat,$saved);   
        }
        $databcat=array_reduce($datacat,'array_merge',array());
        $delete=array_diff($databcat,$category_id);
        // dd($delete);
        foreach($delete as $del)
        {
            // dd($del);
            procat::where('category_id',$del)->delete();
        }
        $add=array_diff($category_id,$databcat);
        $catadd =[];
        foreach($add as $adds)
        {
            $catadd[]=[
                'product_id'=>$id,
                'category_id'=>$adds
            ];
        }
        procat::insert($catadd);
        return redirect('product');

        //size table
        // $size=$request->input('size');
        // $sku=$request->input('sku');
        // DB::update('update sizes set size=?, sku=? where product_id=?',[$size,$sku,$id]);

        // $sizes = $request->size;
        // $skus=$request->sku;
        // dd($skus);
        // $n=count($sizes);
        // $data = [];
        // foreach($sizes as $size) {
        //     foreach($skus as $sku){
        //     $data[] = [
        //         'product_id' => $id,
        //         'size'=>$size,
        //         'sku'=>$sku
        //     ];
        // }}
        // dd($data);
        // sizes::insert($data);
    
    }

    public function sku($id)
    {
        $size=sizes::where('product_id',$id)->get();
        return view('product.size',compact('size'));
    }

    public function add_sku(Request $request,$id)
    {
        $sku=new sizes;
        $size=$sku->size=$request->size;
        // dd($size);
        $skus=$sku->sku=$request->sku; 
        $sku->product_id=$id;
        if(sizes::where('sku',$skus)->exists()){
            echo'SKU already exist';
        } else if(sizes::where('size',$size)->where('product_id',$id)->exists()){
            echo 'Size already exist';
        } else{
        $sku->save();
        return  redirect('product');
    }}
}
