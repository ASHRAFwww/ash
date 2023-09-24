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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('address');
            $table->date('date');
            $table->enum('isReady',['yes','no']);
            $table->integer('price');

            // $table->foreignId('pill_id');
            // $table->foreign('pill_id')->on('pills')->references('id')->cascadeOnDelete();
            // $table->foreignId('pill_accountent_id');
            // $table->foreign('pill_accountent_id')->on('pill_accounts')->references('id')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
