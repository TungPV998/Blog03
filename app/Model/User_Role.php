<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class User_Role extends Model
{
    protected $table="user_role";
    protected $primaryKey = "id";
    protected $guarded = [];
}
