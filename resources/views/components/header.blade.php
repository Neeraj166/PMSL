<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
}

.navbar {
  overflow: hidden;
  background-color: #333;
}

.navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: grey;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}
button {
  background-color: grey; 
  border: none;
  color: white;
  padding: 5px 5px;
  text-align: center;
  text-decoration: none;
  font-size: 16px;
  margin: 1px 1px;
  cursor: pointer;
}
</style>
</head>
<div class="navbar">
    <li style="float:right"><button class="button"><a href="{{route('category.list')}}">Dashboard</a></li></button>
    <li style="float:left" ><button class="button"><a href="{{route('dashboard')}}">Home</a></li></button>
    @foreach($catego as $cat)
        <div class="dropdown">
            <button class="dropbtn"><a href="{{route('category',$cat->id)}}">{{ucwords($cat->cat_name)}}</a>
            <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                @foreach($subcat as $sub)
                    @if($cat->id==$sub->category_id)
                        <a href="{{route('subcategory',$sub->id)}}">{{ucwords($sub->cat_name)}}</a> 
                    @endif
                @endforeach
            </div>
        </div> 
    @endforeach
</div>

