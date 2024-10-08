<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MSensor;

class SensorController extends Controller
{
    // public function readPln(){
    //     $sensor = MSensor::select('*')->get();
    //     return view('readPln', ['nilaisensor'=>$sensor]);
    // }

    public function readPln()
    {
        $sensor = MSensor::select('pln')->first();
        $maxPln = 280; // Define the maximum value for PLN
        return response()->json(['pln' => $sensor->pln, 'maxPln' => $maxPln]);
    }

    public function readBatt1()
    {
        $sensor = MSensor::select('batt1')->first();
        $maxBatt1 = 60; // Define the maximum value for Batt1
        return response()->json(['batt1' => $sensor->batt1, 'maxBatt1' => $maxBatt1]);
    }

    public function readBatt2()
    {
        $sensor = MSensor::select('batt2')->first();
        $maxBatt2 = 60; // Define the maximum value for Batt2
        return response()->json(['batt2' => $sensor->batt2, 'maxBatt2' => $maxBatt2]);
    }

    public function readSuhu()
    {
        $sensor = MSensor::select('suhu')->first();
        $maxSuhu = 100; // Define the maximum value for Suhu
        return response()->json(['suhu' => $sensor->suhu, 'maxSuhu' => $maxSuhu]);
    }

    public function simpanSensor(){
        MSensor::where('id','1')->update(['pln'=>request()->plnVal,'batt1'=>request()->batt1Val,'batt2'=>request()->batt2Val,'suhu'=>request()->suhuVal]);
    }

}
