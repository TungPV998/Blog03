<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table="roles";
    protected $primaryKey = "id";
    protected $guarded = [];
}
