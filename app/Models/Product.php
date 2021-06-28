<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'price',
        'description',
        'images',
        'status',
    ];

    public function category()
    {
        return $this->belongsToMany(categories::class,'procats','product_id','category_id');
    }

    // public function image()
    // {
    //     return $this->hasMany(images::class,'product_id','id');
    // }
}
