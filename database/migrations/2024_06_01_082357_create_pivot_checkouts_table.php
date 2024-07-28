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
        Schema::create('pivot_checkouts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('checkout_id')->constrained('checkouts');
            $table->foreignId('product_id')->constrained('products');
            $table->integer('quantity');
            $table->enum('status', ['pending', 'packing', 'shipping', 'delivered','completed']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pivot_checkouts');
    }
};
