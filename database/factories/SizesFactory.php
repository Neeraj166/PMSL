<?php

namespace Database\Factories;

use App\Models\sizes;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class SizesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = sizes::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id'=>Product::inrandomorder()->first()->id,
            'sku'=>rand(0,10000),
            'size'=>$this->faker->randomElement(['s','m','l']),
        ];
    }
}
