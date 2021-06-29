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
        $tags = collect([
            'Papua',
            'View',
            'Nice View',
            'Nature',
            'PapuaTravel'
        ]);
        $tags->each(function($c){
            Tag::create([
                'tag' => $c,
                'slug' => \Str::slug($c)
            ]);
        });
    }
}
