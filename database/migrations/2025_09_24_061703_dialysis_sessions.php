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
        //
         Schema::create('dialysis_sessions', function (Blueprint $table) {
        $table->id();
        $table->string('or_number')->unique();
        $table->foreignId('patient_id')->constrained('patients')->onDelete('cascade');
        $table->enum('dialysis_type', ['Hemodialysis', 'Peritoneal']);
        $table->enum('status', ['in_progress', 'completed'])->default('in_progress');
        $table->text('notes')->nullable();
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
