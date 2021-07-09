<?php

namespace Database\Factories;

use App\Models\product;
use App\Models\categories;
use App\Models\images;
use App\Models\procat;
use App\Models\sizes;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [    
            'name' => $this->faker->name(),
            'price'=>$this->faker->randomDigit(),
            'description'=>$this->faker->sentence(),
        ];
    }
}
