<?php

namespace Database\Factories;

use App\Enums\ProductUnitEnum;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Store>
 */
class StoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'unit' => $this->faker->randomElement(array_column(ProductUnitEnum::cases(), 'value')),
            'batch_number' => $this->faker->unique()->numberBetween(0, 200),
            'unit_price' => $this->faker->randomFloat(2, 10, 100),
            'purchasing_price' => $this->faker->randomFloat(2, 5, 50),
            'production_date' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'expiry_date' => $this->faker->dateTimeBetween('now', '+1 year'),
            'quantity' => $this->faker->numberBetween(10, 100),
            'remaining_quantity' => $this->faker->numberBetween(0, 50),
            'product_id' => Product::factory()->create()->id,
        ];
    }
}
