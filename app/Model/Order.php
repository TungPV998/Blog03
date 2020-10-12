<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "orders";
    protected $guarded = [];
    protected $primaryKey = "id";

    public function product(){
        return $this->belongsTo(Product::class,"or_product_id","id");
    }

}
