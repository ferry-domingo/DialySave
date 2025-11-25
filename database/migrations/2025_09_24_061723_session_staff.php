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
        Schema::create('session_staff', function (Blueprint $table) {
        $table->id();
        $table->foreignId('session_id')->constrained('dialysis_sessions')->onDelete('cascade');
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // staff only
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
