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
            $table->id();
            $table->integer('main_category_id')->unsigned();
            $table->integer('sub_category_id')->unsigned();
            $table->integer('product_unit_id')->unsigned();
            $table->string('product_name');
            $table->string('product_slug')->unique();
            $table->boolean('status')->default(true);
            $table->float('price');
            $table->string('sku')->unique(); 
            $table->string('product_description')->nullable();
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
