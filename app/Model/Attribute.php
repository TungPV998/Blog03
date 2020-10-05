<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;


class Attribute extends Model
{
    protected $table = "attribute";
    protected $guarded = [];
    protected $type = [
        1=>"Màn Hình",
        2=>"Camera",
        3=>"Bộ Nhớ Trong",
        4=>"Pin",
        4=>"Khác",
    ];
    public function getType(){
        return Arr::get($this->type,$this->attr_type,"[N/A]");
    }
    public function category(){
        return  $this->belongsTo(Categories::class,"attr_category_id");
    }
}
