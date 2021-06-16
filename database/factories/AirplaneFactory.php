<?php

namespace Database\Factories;

use App\Models\Airplane;
use Illuminate\Database\Eloquent\Factories\Factory;

class AirplaneFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Airplane::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'airplane_name' => $this->faker->sentence(1),
            'airplane_description' => $this->faker->sentence(1),
            'slug' => \Str::slug($this->faker->sentence(1)),
            'airplane_image' => $this->faker->image('public/storage/images/airplane', 640, 480, null, false)
        ];
    }
}
