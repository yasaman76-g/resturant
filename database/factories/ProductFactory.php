<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {   
        $this->faker->addProvider(new \FakerRestaurant\Provider\fa_IR\Restaurant($this->faker));
        return [
            'name' => $this->faker->foodName(),
            'price' => '300000',
            'status' => 'on',
            'history' => '',
            'time' => 60,
            'count' => 20,
            'img' => $this->faker->imageUrl($width = 550, $height = 340 , 'foods'),
            'category_id' => 4,
        ];
    }
}
