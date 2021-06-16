<?php

namespace Database\Factories;

use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Factories\Factory;

class RestaurantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Restaurant::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'restaurant_name' => $this->faker->sentence(1),
            'restaurant_address' => $this->faker->sentence(1),
            'restaurant_description' => $this->faker->paragraph(3),
            'restaurant_image' => $this->faker->image("public/storage/images/restaurant", 640, 480, null, false),
            'daysOpen' => 'Senin',
            'time_open' => '09:20',
            'time_close' => '12:20',
            'slug' => \Str::slug($this->faker->sentence(1)),
            'status' => 'Open',
            'categoryId' => 4
        ];
    }
}
