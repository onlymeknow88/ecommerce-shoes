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
        Schema::create('Products', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('description');
            $table->float('rating')->default('0');
            $table->integer('price');
            $table->string('colors')->nullable();
            
            $table->string('size')->nullable();
            $table->string('tags')->nullable();

            $table->bigInteger('categories_id');

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
        Schema::dropIfExists('Products');
    }
}
