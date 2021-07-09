
<x-app-layout>
    <x-slot name="header">
      
    </x-slot>

</h3>
<table>
@foreach($category as $pro)
@foreach($pro->getproduct as $prod)
<tr><td>{{$prod->name}}</td></tr>

@endforeach
@endforeach
</table>
                
</x-app-layout>