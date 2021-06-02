<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List of Categories') }}
        </h2>
    </x-slot>

 

               <a href="addcat">Add Categories</a>
<table>
<th>Categories</th>
</thead>
    @foreach($abc as $categories)
    
        <tr>
        <td>{{$categories->cat_name}}</td>
        </tr>
    
    @endforeach
</table>


</x-app-layout>
