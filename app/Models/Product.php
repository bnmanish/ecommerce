<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;



    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

    public function cat()
    {
        return $this->belongsTo(Category::class, 'category');
    }


}
