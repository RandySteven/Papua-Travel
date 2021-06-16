<?php

namespace Database\Seeders;

use App\Models\Seat;
use Illuminate\Database\Seeder;

class SeatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seat="";
        $code="";
        for($i = 1 ; $i <= 36 ; $i++){
            for($j = 1 ; $j <= 6 ; $j++){
                if($j == 1){
                    $code = "A";
                }
                if($j == 2){
                    $code = "B";
                }
                if($j == 3){
                    $code = "C";
                }
                if($j == 4){
                    $code = "E";
                }
                if($j == 5){
                    $code = "F";
                }
                if($j == 6){
                    $code = "G";
                }
                $seat = "$i$code";
                Seat::create([
                    'seat' => $seat,
                    'status' => 'Aviable',
                    'airplane_id' => 1
                ]);
            }
        }
    }
}
