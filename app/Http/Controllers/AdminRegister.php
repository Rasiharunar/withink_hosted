<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminRegister extends Controller
{
    public function admin_reg()
    {

        return view('admin.register');
    }
    public function admin_code()
    {

        return view('admin.adminCode');
    }

    public function validateAdminCode(Request $request)
    {
        $request->validate([
            'admin_code' => 'required|string',
        ]);

        // Ambil kode admin yang valid dari database
        $validAdminCode = DB::table('admin_security')->where('id', 1)->value('admin_code');

        if ($request->admin_code === $validAdminCode) {
            // Jika kode valid, redirect ke halaman registrasi admin
            return redirect()->route('admin_register');
        } else {
            // Jika tidak valid, kembali ke halaman dengan pesan error
            return redirect()->back()->withErrors(['admin_code' => 'Kode admin tidak valid.']);
        }
    }

}
