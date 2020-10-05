<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $primaryKey="id";
    protected $table="product_img";
    protected $guarded=[];
    public function product(){
        return $this->belongsTo(Product::class,'products_id','id');
    }
}
