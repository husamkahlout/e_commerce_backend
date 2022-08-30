<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')
                  ->onUpdate('cascade')->onDelete('cascade');

            $table->string('name');
            $table->string('email');
            $table->string('city');
            $table->string('neighourhood');
            $table->string('street');
            $table->string('phone');
            $table->string('discount')->default(0);
            $table->string('discount_code')->nullable();
            $table->string('newTotal');
            $table->string('total');
            $table->string('delivery_status');
            $table->string('status')->default('shipped');
            $table->string('error')->nullable();

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
        Schema::dropIfExists('orders');
    }
}
