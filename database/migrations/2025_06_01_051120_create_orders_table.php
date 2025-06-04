<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('order_number', 20)->unique(); // Nomor pesanan
            $table->decimal('total_amount', 12, 2); // Total pembayaran
            $table->enum('status', ['pending', 'paid', 'cancelled', 'expired'])->default('pending');
            $table->string('payment_method', 50)->nullable(); // Metode pembayaran
            $table->string('payment_proof')->nullable(); // Bukti pembayaran
            $table->text('notes')->nullable(); // Catatan pesanan
            $table->dateTime('expired_at')->nullable(); // Batas waktu pembayaran
            $table->dateTime('paid_at')->nullable(); // Waktu pembayaran
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
};