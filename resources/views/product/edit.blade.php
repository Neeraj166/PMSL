<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Products</title>
</head>
@foreach($product->getimage as $image)
    <img src="{{asset('uploads')}}/{{$image->image}}" height="200" width="200">
@endforeach
<form action="{{route('edit',$product->id)}}" method="post" enctype="multipart/form-data">

    @csrf
    <table>           
        <tr>
               <td><b>Select Category:</b></td>
               <td>
               @foreach($category as $catego)
               <tr><td><b>{{$catego->cat_name}}</b></td></tr>
                @foreach($subcat as $sub)
                @if($catego->id==$sub->category_id)
                <tr><td><input type="checkbox" value="{{$sub->id}}" name="category_id[]" @foreach($product->getcategory as $category) @if ($category->id==$sub->id) checked @endif @endforeach  > 
               {{$sub->cat_name}}</td></tr>
                @endif
                @endforeach
                @endforeach

                <tr>
                <td>Product Name:</td>
                <td>
                    <input type="text" name="name" value="{{$product->name}}" required>
                </td>
            </tr><tr>
            <tr>
                <td>Price:</td>
                <td>
                    <input type="number" name="price" value="{{$product->price}}"  required>
                </td>
            </tr><tr>
            <td>Description:</td><td>
            <textarea name="description" placeholder='Product Description' required >{{$product->description}}</textarea>  
            </td>
            </tr>
            <tr>
                <td>Product Status:</td>
                <td>
                    <input type="radio" name="status" value="1" @if($product->status==="1")checked @endif>Active
                    <input type="radio" name="status" value="0" @if($product->status==="0")checked @endif>InActive
                </td>
            </tr></br>
            
             @foreach($product->getsize as $gets)
             <tr> <td>SKU:</td>
                    <td> <input type="integer" value="{{$gets->sku}}" readonly ></td>
                    <td>Size:</td>
                    <td> <select name="size[]">
                    <Option value="s" @if($gets->size=='s') selected @endif >S</Option>
                    <Option value="m" @if($gets->size=='m') selected @endif >M</Option>
                    <Option value="l" @if($gets->size=='l') selected @endif >L</Option>
                    </select></td></tr>
            @endforeach
            <tr><td><a href="{{route('sku',$product->id)}}" target="_blank">Add more SKU</a></td></tr>
            <tr><td>Image:</td><td>
            <input type="file" name="image[]" multiple >
            <tr>  <td>
                <input type ="submit" value="Submit">
                </td>
            </tr>

</form>
<body>
</body>
</html>