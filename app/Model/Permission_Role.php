<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Permission_Role extends Model
{
    protected $table="permission_role";
    protected $primaryKey = "id";
    protected $guarded = [];
}
