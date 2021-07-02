<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'description',
        'images',
        'status',
    ];

    public function getcategory()
    {
        return $this->belongsToMany(categories::class,'procats','product_id','category_id');
    }

    public function getimage()
    {
        return $this->hasmany(images::class,'product_id','id');
    }

    public function getsize()
    {
        return $this->hasmany(sizes::class,'product_id','id');
    }


    // public function image()
    // {
    //     return $this->hasMany(images::class,'product_id','id');
    // }
}
