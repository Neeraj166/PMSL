<x-header/>
<table>
@foreach($product as $pro)
    @foreach($pro as $prods)<tr><td>{{$prods->name}}</td></tr>
        @foreach($prods->getimage as $prod)
        <td><img src="{{asset('uploads')}}/{{$prod->image}}" height="100" width="100"></td><td>{{$prods->name}}</td></tr>
        @endforeach
    @endforeach
@endforeach
</table>
                