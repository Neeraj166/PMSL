
</h3>
<table>
@foreach($category as $pro)
@foreach($pro->getsubcategory as $get)
@foreach($get->getproduct as $prod)
<tr><td>{{$prod->name}}</td></tr>
@endforeach
@endforeach
@endforeach
</table>
                
