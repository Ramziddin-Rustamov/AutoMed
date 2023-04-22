<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('clientName');
            $table->string('clientPhone')->nullable();
            $table->string('clientCarNumber')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict')->onUpdate("restrict");
            $table->string('product1');
            $table->string('product2')->nullable();
            $table->string('product3')->nullable();
            $table->string('product4')->nullable();
            $table->string('product5')->nullable();
            $table->string('product6')->nullable();
            $table->string('product7')->nullable();
            $table->string('product8')->nullable();
            $table->string('product9')->nullable();
            $table->string('product10')->nullable();

            $table->string('numproduct1');
            $table->string('numproduct2')->nullable();
            $table->string('numproduct3')->nullable();
            $table->string('numproduct4')->nullable();
            $table->string('numproduct5')->nullable();
            $table->string('numproduct6')->nullable();
            $table->string('numproduct7')->nullable();
            $table->string('numproduct8')->nullable();
            $table->string('numproduct9')->nullable();
            $table->string('numproduct10')->nullable();

            $table->string('total1price');
            $table->string('total2price')->nullable();
            $table->string('total3price')->nullable();
            $table->string('total4price')->nullable();
            $table->string('total5price')->nullable();
            $table->string('total6price')->nullable();
            $table->string('total7price')->nullable();
            $table->string('total8price')->nullable();
            $table->string('total9price')->nullable();
            $table->string('total10price')->nullable();

            $table->string('totalPrice')->nullable();
            $table->string('publishedBy');
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
        Schema::dropIfExists('services');
    }
}