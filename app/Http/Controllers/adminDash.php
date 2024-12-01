<?php

namespace App\Http\Controllers;

use App\Models\MSensor;
use App\Models\Relay;
use App\Models\User;
use Illuminate\Http\Request;

class adminDash extends Controller
{
    //
    public function adminView(){
    $users = User::all();
    $relays = Relay::all();
    $sensors = MSensor::all();

    return view('admin.dashboard', compact('users', 'relays', 'sensors'));
    }
}
