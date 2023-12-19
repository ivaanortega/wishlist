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
            $table->bigIncrements('id');
            $table->string('name',50);
            $table->string('description',1000);
            $table->integer('price')->nullable()->default(0);
            $table->integer('priority')->nullable()->default(1);
            $table->string('url',2048)->nullable();
            $table->binary('image')->nullable();
            $table->string('image_url',2048)->nullable();
            $table->boolean('buyed')->default(false);
            $table->timestamps();
        });

        Schema::table('products', function (Blueprint $table) {
            $table->unsignedBigInteger('lists_id');
         
            $table->foreign('lists_id')->references('id')->on('lists');
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
