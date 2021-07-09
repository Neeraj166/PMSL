
<x-app-layout>
    <x-slot name="header">
      
    </x-slot>
    <h3 class="font-semibold text-xl text-gray-800 leading-tight">@foreach($subcat as $sub)
    <a href="{{route('subcategory',$sub->id)}}">{{$sub->cat_name}}</a>
@endforeach
</h3>
<table>
@foreach($category as $pro)
@foreach($pro->getproduct as $prod)
<tr><td>{{$prod->name}}</td></tr>

@endforeach
@endforeach
</table>
                
</x-app-layout>