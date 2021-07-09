<?php

namespace Database\Factories;

use App\Models\images;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImagesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = images::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id'=>Product::inrandomorder()->first()->id,
            'image'=>$this->faker->image(),
        ];
    }
}
