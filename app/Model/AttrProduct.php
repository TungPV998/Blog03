<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AttrProduct extends Model
{
    protected $primaryKey = "id";
    protected $table = "attr_product";
    protected $guarded = [];
    public function product(){

    }
}
