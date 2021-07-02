<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add SKU</title>
</head>
<body>
@foreach($size as $size)
<form action="{{route('addsku',$size->product_id)}}" method="post">@endforeach
@csrf
SKU:<input type="text" name="sku">
Size:<select name="size">
                    <Option value="s" >S</Option>
                    <Option value="m" >M</Option>
                    <Option value="l" >L</Option>
                    </select>
<input type="submit" value="Submit">
</form>

</body>
</html>