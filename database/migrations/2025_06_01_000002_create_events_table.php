<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->dateTime('event_date');
            $table->string('image')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('venue')->nullable();
            $table->decimal('price', 10, 2)->default(0);
            $table->timestamps();

            // foreign key jika ada tabel categories
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('events');
    }
};
