<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('username', 50);
            $table->string('email')->unique();
            $table->string('password', 100);
            $table->string('phone_number', 9);
            $table->enum('gender', ['male', 'female']);
            $table->date('birth_of_data')->nullable();
            $table->enum('status', ['active', 'inactive']);
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
