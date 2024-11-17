<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MSensor;
use Illuminate\Support\Facades\Auth;

class SensorController extends Controller
{


    public function readKelembapan()
    {
        $userId = Auth::id();

        // Mengambil kelembapan berdasarkan user_id
        $sensor = MSensor::where('user_id', $userId)->select('kelembapan')->first();

        // $sensor = MSensor::select('kelembapan')->first();
        $maxKelembapan = 280; // Define the maximum value for PLN
        return response()->json(['kelembapan' => $sensor->kelembapan, 'maxKelembapan' => $maxKelembapan]);
    }

    public function readVolumeTanki()
    {
        $userId = Auth::id();

        // Mengambil volume tanki berdasarkan user_id
        $sensor = MSensor::where('user_id', $userId)->select('volume_tanki')->first();
        $maxVolumeTanki = 60; // Define the maximum value for Batt1

        return response()->json(['volume_tanki' => $sensor->volume_tanki, 'maxVolumeTanki' => $maxVolumeTanki]);
    }

    public function simpanSensor(Request $request)
    {
        // Validasi input
        $request->validate([
            'kelembapan' => 'required|numeric',
            'volume_tanki' => 'required|numeric',
        ]);

        // Mendapatkan user yang sedang login
        $userId = Auth::id();

        // Update data sensor berdasarkan user_id
        MSensor::where('user_id', $userId)->update([
            'kelembapan' => $request->kelembapan,
            'volume_tanki' => $request->volume_tanki,
        ]);

        return response()->json(['message' => 'Data sensor berhasil diperbarui.']);
    }


}
