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
            $table->string('id');
            $table->primary('id');
            $table->string('name', 300);
            $table->string('slug', 300);
            $table->string('category_id');
            $table->string('vendor_id');
            $table->boolean('status');
            $table->boolean('available');
            $table->string('main_image', 300);
            $table->text('list_image', 500);
            $table->unsignedDecimal('price');
            $table->unsignedTinyInteger('discount');
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
