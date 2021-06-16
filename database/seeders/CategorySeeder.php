<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range(1, 5) as $index){
            Category::create([
                'category' => $faker->sentence(2),
                'slug' => \Str::slug($faker->sentence(2)),
                'category_description' => $faker->sentence(3),
                'category_image' => $faker->image('public/storage/images/category', 640, 480, null, false)
            ]);
        }
    }
}
