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
        Schema::create('returns', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('loan_detail_id');
            $table->boolean('charge')->default(false);
            $table->integer('amount')->default(0);
            $table->foreign('loan_detail_id')->references('id')->on('loan_detail');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('returns');
    }
};
