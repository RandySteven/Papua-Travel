<?php

namespace Database\Factories;

use App\Models\Hotel;
use Illuminate\Database\Eloquent\Factories\Factory;

class HotelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Hotel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'hotel_name' => $this->faker->sentence(1),
            'hotel_description' => $this->faker->paragraph(3),
            'hotel_address' => $this->faker->sentence(1),
            'hotel_image' => $this->faker->image("public/storage/images/hotel", 640, 480, null, false),
            'slug' => \Str::slug($this->faker->sentence(1)),
            'ratingId' => 4
        ];
    }
}
