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
        Schema::create('trx_tim_peg', function (Blueprint $table) {
            $table->bigIncrements('tim_peg_id');
            $table->unsignedBigInteger('tim_id')->constrained()->cascadeOnDelete();
            $table->unsignedBigInteger('peg_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trx_tim_peg');
    }
};
