<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments("id");
            $table->string("pro_name")->nullable();
            $table->string("pro_slug")->nullable();
            $table->integer("unit_price")->default(0);
            $table->integer("sale_price")->default(0);
            $table->integer("discount")->default(0);
            $table->integer('category_id')->unsigned()->nullable();
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');
            $table->string("quatity")->nullable();
            $table->string("pro_img")->nullable();
            $table->longText("pro_content")->nullable();
            $table->string("pro_description")->nullable();
            $table->integer('review_star')->default(0);
            $table->tinyInteger("active")->default(0);
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
        Schema::dropIfExists('products');
    }
}
