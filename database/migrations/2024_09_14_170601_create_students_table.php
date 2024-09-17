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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique()->nullable(); // Fixed method call
            $table->integer('age');
            $table->string('address');
            $table->string('email')->unique()->nullable(); // Fixed method call
            $table->enum('level', ['1 sec', '2 sec', '3 sec']); // Removed extra spaces
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
