<x-header/>
<table>
@foreach($category as $pro)
    @if($pro->status==1)
        @foreach($pro->getproduct as $prod)
            <tr><td>{{$prod->name}}</td></tr>
        @endforeach
    @endif
@endforeach
</table>