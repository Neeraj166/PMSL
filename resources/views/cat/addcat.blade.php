<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Add Task') }}
    </h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">

    <form action="{{ route('addcat') }}" method="post" >
            @csrf
            <table>           
            <tr>
               <td>Category Name:</td>
               <td>
               <input type="text" name="name" >
               </td>

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