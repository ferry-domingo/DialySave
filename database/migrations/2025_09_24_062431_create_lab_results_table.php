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
        Schema::create('lab_results', function (Blueprint $table) {
        $table->id();
        $table->foreignId('session_id')->constrained('dialysis_sessions')->onDelete('cascade');
        $table->decimal('hemoglobin', 4, 1)->nullable();
        $table->decimal('creatinine', 4, 2)->nullable();
        $table->decimal('potassium', 4, 2)->nullable();
        $table->text('remarks')->nullable();
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lab_results');
    }
};
