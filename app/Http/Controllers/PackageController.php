<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Package;
use App\Models\Schedule;
use Illuminate\Http\Request;

class PackageController extends Controller
{

    public function index(){
        $packages = Package::get();
        return view('content.package.index', compact('packages'));
    }

    public function create(){
        $schedules = Schedule::get();
        $hotels = Hotel::get();
        return view('content.package.create', compact('schedules', 'hotels'));
    }

    public function store(Request $request){
        $attr = $request->all();
        Package::create($attr);
    }

    public function expiredDelete(Package $package){
        $getDate = getdate(date("U"));
        if("$getDate[mon]"<10){
            $today_date = "$getDate[year]-0$getDate[mon]-$getDate[mday]";
        }else{
            $today_date = "$getDate[year]-$getDate[mon]-$getDate[mday]";
        }
        if($package!=null){
            if($package->expired == $today_date){
                $package->delete();
            }
        }
    }

    public function show(Package $package){
        return view('content.package.show', compact('package'));
    }

    public function order(Package $package){
        $schedule = $package->schedule()->first();
        return view('content.airplane.book.create', compact('package', 'schedule'));
    }
}
