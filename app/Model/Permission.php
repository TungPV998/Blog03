<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table="permission";
    protected $primaryKey = "id";
    protected $guarded = [];
}
