<?php

namespace Database\Factories;

use App\Models\procat;
use App\Models\Product;
use App\Models\categories;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProcatFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = procat::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id'=>Product::inrandomorder()->first()->id,
            'category_id'=>categories::inrandomorder()->first()->id,
        ];
    }
}
