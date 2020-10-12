<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = "transactions";
    protected $guarded = [];
    protected $primaryKey = "id";

    public function order(){
        return $this->hasMany(Order::class,"or_transaction_id","id");
    }
}
