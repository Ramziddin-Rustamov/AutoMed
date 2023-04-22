<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopSellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_sellers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict')->onUpdate("restrict");
            $table->string('product1');
            $table->string('product2')->nullable();
            $table->string('product3')->nullable();
            $table->string('product4')->nullable();

            $table->string('numproduct1');
            $table->string('numproduct2')->nullable();
            $table->string('numproduct3')->nullable();
            $table->string('numproduct4')->nullable();

            $table->string('total1price');
            $table->string('total2price')->nullable();
            $table->string('total3price')->nullable();
            $table->string('total4price')->nullable();

            $table->string('totalPrice')->nullable();
            $table->string('clientPhone')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('shop_sellers');
    }
}