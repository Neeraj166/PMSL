<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Categories
    </h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
<table >
<thead>
<th>Categories</th>
<th>Status</th>
<th>Action</th>
</thead>
    @foreach($catego as $categories)
        <tr>
        <td><b>{{$categories->cat_name}}</b></td>
        @if($categories->status==='1')
            <td><b>Active</b></td>             
        @else
            <td><b>InActive<h3></b></td>                
        @endif
            <td><h3><a href="{{route('editcat',$categories->id)}}"><b>Edit</b></a></h3></td></tr>
        @foreach($subcatego as $category)
            @if($categories->id===$category->category_id)
                
                <tr>
                <td>{{$category->cat_name}}</td>
                    @if($category->status==='1')
                        <td> Active</td>
                    @else
                        <td>InActive</td> 
                    @endif
                        <td><a href="{{route('editcat',$category->id)}}">Edit</a></td></tr>
            @endif
        @endforeach
    @endforeach
</table>
</div>
</div>
</div>
</x-app-layout>
