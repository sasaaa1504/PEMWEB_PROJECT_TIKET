<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained()->onDelete('cascade');
            $table->string('name'); // Nama tiket (VIP, Regular, dll)
            $table->text('description')->nullable(); // Deskripsi tiket
            $table->decimal('price', 12, 2); // Harga tiket
            $table->integer('quantity'); // Jumlah tiket tersedia
            $table->integer('sold')->default(0); // Jumlah tiket terjual
            $table->boolean('is_active')->default(true); // Status aktif
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tickets');
    }
};