<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class SensorViewController extends Controller
{
    public function sensorView(){
        return view('sensor');
    }
}
