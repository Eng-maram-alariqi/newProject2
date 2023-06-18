<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('type', ['منزل', 'محل', 'مطعم', 'مكتب', 'اخري']);
            $table->decimal('longitude', 10, 8);
            $table->decimal('latitude', 10, 8);
            $table->text('note');
            $table->foreignId('city_id')->constrained('cities')->cascadeOnDelete();
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
