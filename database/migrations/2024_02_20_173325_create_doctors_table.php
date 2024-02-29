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
        Schema::create('doctors', function (Blueprint $table) {
            // Page One
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->string('phone')->nullable();
            $table->string('card_img')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();

            // Page Two
            $table->unsignedBigInteger('specialty_id')->nullable();
            $table->string('education');
            $table->string('experience');
            $table->string('day_work')->nullable();
            $table->time('time_from')->nullable();
            $table->time('time_to')->nullable();
            $table->decimal('price', 8, 2)->default(0.00);
            $table->time('waiting_time')->nullable();

            $table->enum('urgent_book', ['yes', 'no'])->nullable();
            $table->decimal('urgent_price', 8, 2)->nullable()->default(null);
            $table->timestamps();

            $table->foreign('specialty_id')->references('id')->on('specialty');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
