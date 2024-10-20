<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function images()
    {
        return $this->hasMany(ProductImage::class,'product_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
    public function productImages()
    {
        return $this->hasMany(ProductImage::class,'product_id');
    }
}
