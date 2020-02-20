<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->Increments('id');
            $table->integer('cat_id');
            $table->integer('brand_id');
            $table->string('pro_name');
            $table->text('pro_short_desc');
            $table->text('pro_long_desc');
            $table->integer('pro_qty');
            $table->double('pro_price', 10,2);
            $table->double('pro_discount', 10,2)->nullable();
            $table->text('pro_image');
            $table->tinyInteger('status');
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
