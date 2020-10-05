<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $primaryKey = "id";
    protected $fillable = ["id","c_name","parent_id"];
    protected $table = 'categories';
    public function product(){
        return $this->hasMany(Product::class,'','id');
    }
    public function categoryChild(){
        return $this->hasMany(Categories::class,'parent_id');
    }
}
