<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Products
    </h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5"> 
            <table>
            <thead>
            <th>Product Image</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Description</th>
            <th>Status</th>
            <th>Action</th>
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
                <td><a href="{{route('edit',$product->id)}}">View Details</a></td></td></tr>
            @endforeach
            </table>
        </div>
    </div>
</div>
</x-app-layout>