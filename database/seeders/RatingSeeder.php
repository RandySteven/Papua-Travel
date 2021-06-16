<?php

namespace Database\Seeders;

use App\Models\Rating;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for($i = 1 ; $i <= 5 ; $i++ ){
            Rating::create([
                'rating_score' => $i,
                'slug' => \Str::slug($i),
                'rating_description' => $faker->sentence(2)
            ]);
        }
    }
}
