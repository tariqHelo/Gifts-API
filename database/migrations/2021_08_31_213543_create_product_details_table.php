<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_details', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('number');
            $table->string('type');
            $table->integer('barcode');
            $table->integer('qty');
            $table->integer('price');
            $table->integer('purchasing_price');
            $table->integer('purchasing_price2');
            $table->string('image');
            $table->enum('personalization', ['active', 'draft']);
            $table->enum('brand', ['active', 'draft']);

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
        Schema::dropIfExists('product_details');
    }
}
