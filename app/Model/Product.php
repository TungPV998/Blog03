<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = "id";
    protected $table = 'products';
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id', 'id');
    }

    public function productImage(){
        return $this->hasMany(ProductImage::class,'products_id','id');
    }


}
