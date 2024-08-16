<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('payment', function (Blueprint $table) {
            $table->increments('payment_id');
            $table->double('totalamount', 10, 2)->nullable();
            $table->bigInteger('order_id')->unsigned();
            $table->timestamps();

            $table->foreign('order_id')->references('order_id')->on('orders')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('payment');
    }
};
