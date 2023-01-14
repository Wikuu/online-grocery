<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cart_id')->constrained('carts')->onDelete('cascade');
            $table->string('payment_method');
            $table->dateTime('order_time');
            $table->foreignId('address_id')->constrained('addresses')->onDelete('cascade');
            $table->enum('status', ['pending', 'processing', 'shipped', 'delivered', 'cancelled']);
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
};
