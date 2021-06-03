<a href="addcat">Add Categories</a><br>
<a href="create">Add Products</a>

<table >
<thead>
<th>Categories</th>
<th>Status</th>
<th>Action</th>
</thead>
    @foreach($catego as $categories)
    
        <tr>
        <td><h3>{{$categories->cat_name}}</h3></td>
        @if($categories->status==='1')
                   <td><h3>Active</h3></td>
               
                   @else
                    <td><h3>InActive<h3></h3></td>
                   
                   
                   
        @endif
                   <td><h3><a href="{{route('editcat',$categories->id)}}">Edit</a></h3></td></tr>
                
                  
        
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

