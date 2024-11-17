<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator; // Memperbaiki namespace Validator
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function regisForm(){
        return view('register');
    }

    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role'=>'required|string|in:user,admin'

        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->name),
            'role'=>$request->role,
        ]);
        return redirect()->route('login')->with('success','Register Success');
    }
}
