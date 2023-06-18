<?php

use App\Enums\ProductUnitEnum;
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
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->enum("unit", array_column(ProductUnitEnum::cases(), 'value'));
            $table->decimal("unit_price");
            $table->integer("batch_number");
            $table->decimal("purchasing_price");
            $table->date("production_date");
            $table->date("expiry_date");
            $table->integer("quantity");
            $table->boolean('is_active')->default(true);
            $table->integer("remaining_quantity")->default(0);
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stores');
    }
};
