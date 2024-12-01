<?php

namespace App\Http\Controllers;

use App\Models\MSensor;
use App\Models\Relay;
use App\Models\User;
use Illuminate\Http\Request;

class editView extends Controller
{
    //
    public function editView(){
    $users = User::all();
    $relays = Relay::all();
    $sensors = MSensor::all();
    return view('admin.edit', compact('users', 'relays', 'sensors'));

    }
}
