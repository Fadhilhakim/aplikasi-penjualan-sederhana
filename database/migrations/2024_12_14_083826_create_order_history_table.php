<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
            Schema::create('order_history', function (Blueprint $table) {
                $table->id();
                $table->string('user_name');
                $table->string('user_email');
                $table->date('order_date');
                $table->integer('total_quantity');
                $table->integer('total_price');
                $table->string('status');
                $table->string('payment');
                $table->json('products_order'); 
                $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_history');
    }
};
