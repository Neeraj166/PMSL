
    <form action="{{ route('addsubcat') }}" method="post" >
            @csrf
            <table>   
            <tr>Select Category:
               <select  name="id">
               @foreach($category as $categories)
               <label>Select Categories</label>
               <option value="{{$categories->id}}"> {{$categories->cat_name}}</option>
               @endforeach
               </select>
            </tr>
            <tr>
               <td>Sub-category Name:</td>
               <td>
               <input type="text" name="name" >
               </td>

            <tr>            
            <tr>  <td>
                <input type ="submit" value="ADD" >
                </td>
            </tr>
            </table>
 </form>
