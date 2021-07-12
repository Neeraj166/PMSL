<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Add Categories') }}
    </h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
        <a href="showcat">Display Categories</a>
        
    <form action="{{ route('addcat') }}" method="post" >
            @csrf
            <table>           
            <tr>
               <td>Category Name:</td>
               <td>
               <input type="text" name="cat_name" >
               </td>
               <tr><td>Sub-Category of:</td>
               <td>
               <select name='category_id'>
               <option value="">No Sub-categor</option>
               @foreach($catego as $categories)
               <option value="{{$categories->id}}">{{$categories->cat_name}}</option>


               @endforeach
               
               </select>
               </td></tr>

            <tr>            
            <tr>  <td>
                <input type ="submit" value="ADD" name ="add">
                </td>
            </tr>
            </table>
 </form>
 </div>
    </div>
</div>
</x-app-layout>