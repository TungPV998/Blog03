<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditColumnTypeSalePriceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('sale_price');
        });
    }


    public function down()
    {

//        Schema::table('products', function (Blueprint $table) {
//            $table->string('sale_price')->nullable()->change();
//
//        });
    }
}
