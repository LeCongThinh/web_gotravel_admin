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
        Schema::create('book_tours', function (Blueprint $table) {
            $table->id();
            $table->string('tour_name');
            $table->date('departure_day');
            $table->integer('price'); 
            $table->string('user_name');
            $table->string('phone');
            $table->string('email');
            $table->integer('adult');
            $table->integer('child');
            $table->bigInteger('sum_price');
	        $table->string('payment');
            $table->integer('status')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_tours');
    }
};
