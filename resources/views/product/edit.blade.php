<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Products</title>
</head>

<body>
@foreach($image as $image)
<img src="{{$image->image}}" height="200" width="200">
@endforeach
    <form action="" method="post" enctype="multipart/form-data">
    @csrf
    <table>           
            <tr>
               <td>Category:</td>
               <td>
               <select name="category_id">
 
               </select>
               </td>
            <tr>
                <td>Product Name:</td>
                <td>
                    <input type="text" name="name" value="{{$product->name}}" >
                </td>
            </tr><tr>
            <tr>
                <td>Price:</td>
                <td>
                    <input type="number" name="price"  value="{{$product->price}}">
                </td>
            </tr><tr>
            <td>Description:</td><td>
            <textarea name="description" >{{$product->description}}</textarea>  
            </td>
            </tr>
            <tr><td>Add Image:</td><td>
            <input type="file" name="image[]" multiple required>
            <tr>  <td>
                <input type ="submit" value="Update">
                </td>
            </tr>
            </table>    
    
    </form>
</body>
</html>