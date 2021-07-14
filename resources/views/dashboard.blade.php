<x-header/>
<table border="1px">
    <div><tr>
        @foreach($product as $products)
        @foreach($products->getimage as $pro)
        <td><img src="{{asset('uploads')}}/{{$pro->image}}" height="100" width="100"></td><tr><td>{{$products->name}}</td></tr>
        @break @endforeach
        @endforeach</tr>
    </div>
</table>