<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
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
