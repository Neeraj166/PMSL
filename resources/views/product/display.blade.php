<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Product</title>
</head>
<body>
    <a href="create">Add Product </a>
    <a href="addcat">Add Categories</a>
    <table border="1">
    <thead>
    <th>Product Image</th>
    <th>Product Name</th>
    <th>Price</th>
    <th>Description</th>
    <th>Status</th>
    <th colspan="2">Action</th>

    </thead>
    @foreach($product as $product)
    @foreach($image as $images)
    @if($product->id===$images->product_id)
    <tr><td><img src="{{asset('uploads')}}/{{$images->image}}" height="50" width="50"> @break
    @endif
    @endforeach 
    <td>{{$product->name}}</td>
   <td>{{$product->price}}</td>
   <td>{{$product->description}}</td>
    <td>@if("$product->status"==='1')Active @else Inactive @endif</td>
    <td><a href="{{route('edit',$product->id)}}">View Details</a></td>
 
    </td>

    </tr>
    @endforeach
    </table>
</body>
</html>