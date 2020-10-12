<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments("id");
            $table->string('name')->nullable();
            $table->string('telephone')->nullable();
            $table->string('address')->nullable();
            $table->string('note')->nullable();
            $table->integer('order_id')->default(0);
            $table->integer('user_id')->default(0);
            $table->tinyInteger('tst_status')->default(0);
            $table->tinyInteger('tst_type')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction');
    }
}
