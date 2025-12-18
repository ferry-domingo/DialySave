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
       Schema::create('vital_signs', function (Blueprint $table) {
    $table->id();
    $table->foreignId('session_id')->constrained('dialysis_sessions')->onDelete('cascade');
    $table->string(column: 'blood_pressure')->nullable();
    $table->integer('heart_rate')->nullable();
    $table->decimal('temperature', 4, 1)->nullable();
    $table->decimal('weight_before', 5, 2)->nullable();
    $table->decimal('weight_after', 5, 2)->nullable();
    $table->integer('respiratory_rate')->nullable(); 
    $table->timestamps();
});


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vital_signs');
    }
};
