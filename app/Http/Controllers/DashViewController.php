<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashViewController extends Controller
{
    public function dashView(){
        return view('dashboard');
    }
}
