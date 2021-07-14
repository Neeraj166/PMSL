<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Add Product
    </h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
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
               <td><input type="checkbox" name="category_id[]" value="{{$category->id}}">
               {{$category->cat_name}}</td></td></tr></tr>
               @endif
               @endforeach
               @endforeach

               </td>
            <tr>
                <td>Product Name:</td>
                <td>
                    <input type="text" name="name" required>
                </td>
            </tr><tr>
            <tr>
                <td>Price:</td>
                <td>
                    <input type="number" name="price" required>
                </td>
            </tr><tr>
            <td>Description:</td><td>
            <textarea name="description" placeholder='Product Description' required></textarea>  
            </td>
            </tr>
            <tr>
                <td>SKU:</td>
                <td>
                    <input type="integer" name="sku" required >
                </td>
            </tr>
            <tr>
                <td>Size:</td>
                <td>
                    <select name="size">
                    <Option value="s">S</Option>
                    <Option value="m">M</Option>
                    <Option value="l">L</Option>
                    </select>
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
    </div>
    </div>
</div>
</x-app-layout>