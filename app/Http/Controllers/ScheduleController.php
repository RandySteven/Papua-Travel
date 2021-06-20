<?php

namespace App\Http\Controllers;

use App\Models\Airplane;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function create(){

    }

    public function store(Request $request){
        Schedule::create([
            'departure_location' => $request->departure_location,
            'schedule_date' => $request->schedule_date,
            'schedule_time' => $request->schedule_time,
            'arival_time' => $request->arival_time,
            'airplane_id' => $request->get('airplane_id')
        ]);
        return back();
    }

    public static function autodelete(Schedule $schedule){
        $getDate = getdate(date("U"));
        if("$getDate[mon]"<10){
            $today_date = "$getDate[year]-0$getDate[mon]-$getDate[mday]";
        }else{
            $today_date = "$getDate[year]-$getDate[mon]-$getDate[mday]";
        }
        if($schedule != null){
            if($schedule->schedule_date == $today_date){
                $schedule->delete();
            }
        }
    }
}
