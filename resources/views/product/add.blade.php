<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Products</title>
</head>

<body>
<a href="showcat">Display Categories</a>
<a href="product">Display Products</a>

    <form action="{{route('product.create')}}" method="post" enctype="multipart/form-data">
    @csrf
    <table>           
            <tr>
               <td><b>Select Category:</b></td>
               <td>
               @foreach($catego as $catego)
                <tr><td><b>{{$catego->cat_name}}</b></td></tr>
               @foreach($categories as $category)
               @if($catego->id===$category->category_id)
               <td><input type="radio" name="category_id" value="{{$category->id}}">
               <label>{{$category->cat_name}}</label></td></td></tr></tr>
               @endif
               @endforeach
               @endforeach

               </td>
            <tr>
                <td>Product Name:</td>
                <td>
                    <input type="text" name="name" >
                </td>
            </tr><tr>
            <tr>
                <td>Price:</td>
                <td>
                    <input type="number" name="price" >
                </td>
            </tr><tr>
            <td>Description:</td><td>
            <textarea name="description" placeholder='Product Description'></textarea>  
            </td>
            </tr>
            <tr><td>Image:</td><td>
            <input type="file" name="image[]" multiple required>
            <tr>  <td>
                <input type ="submit" value="Submit">
                </td>
            </tr>
            </table>     
    
    </form>
</body>
</html>