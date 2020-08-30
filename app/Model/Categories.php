<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $primaryKey = "id";
    protected $fillable = ["id","c_name","parent_id"];
    protected $table = 'categories';
}
