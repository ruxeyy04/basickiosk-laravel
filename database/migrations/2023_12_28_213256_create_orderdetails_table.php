<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('orderdetails', function (Blueprint $table) {
            $table->bigInteger('order_id')->unsigned();
            $table->bigInteger('serial_id')->unsigned();
            $table->integer('quantity')->nullable();
            $table->timestamps();

            $table->primary(['order_id', 'serial_id']);
            $table->foreign('order_id')->references('order_id')->on('orders')->onDelete('cascade');
            $table->foreign('serial_id')->references('serial_id')->on('products')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('orderdetails');
    }
};
