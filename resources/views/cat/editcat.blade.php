<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Add Task') }}
    </h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
        <a href="showcat">Display Categories</a>
    <form action="{{ route('updatecat',$category->id )}}" method="post" >
            @csrf
            <table>           
            <tr>
               <td>Category Name:</td>
               <td>
               <input type="text" name="cat_name" value="{{$category->cat_name}}" >
               </td>
               <tr>
                <td>Category Status:</td>
                <td>
                    <input type="radio" name="status" value="1" @if($category->status==="1")checked @endif>Active
                    <input type="radio" name="status" value="0" @if($category->status==="0")checked @endif>InActive
                </td>
            </tr></br>
            <tr>            
            <tr>  <td>
                <input type ="submit" value="UPDATE" name ="add">
                </td>
            </tr>
            </table>
 </form>
 </div>
    </div>
</div>
</x-app-layout>