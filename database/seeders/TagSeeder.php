<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for($i = 0 ; $i < 5 ; $i++){
            Tag::create([
                'tag' => $faker->sentence(2),
                'tag_description' => $faker->sentence(5),
                'slug' => \Str::slug($faker->sentence(2))
            ]);
        }
    }
}
