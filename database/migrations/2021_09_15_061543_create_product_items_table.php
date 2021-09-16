<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('product_id')->nullable()->constrained('products', 'id')->nullOnDelete();
            $table->string('number');
            $table->string('type');
            $table->string('barcode');
            $table->string('qty');
            $table->string('price');
            $table->string('purchasing_price');
            $table->string('purchasing_price2');
            $table->string('image');
            $table->string('personalization');
            $table->string('brand');
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
        Schema::dropIfExists('product_items');
    }
}
