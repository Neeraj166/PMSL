<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    use HasFactory;
    protected $gaurded=[];

    protected $fillable = [
        'category_id',
        'cat_name',
        'status'
    ];

    public function getproduct()
    {
        return $this->belongsToMany(Product::class,'procats','category_id','product_id');
    }

    public function getsubcategory()
    {
        return $this->hasMany(categories::class,'category_id','id');
    }
    public function getprocat()
    {
        return $this->hasMany(procat::class,'category_id','id');
    }

}