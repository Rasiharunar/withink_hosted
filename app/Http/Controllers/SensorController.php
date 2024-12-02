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

      public function simpanSensor($deviceCode, $kelembapan, $volume_tanki)
    {
        // Validasi input
        if (!is_numeric($kelembapan) || !is_numeric($volume_tanki)) {
            return response()->json(['message' => 'Kelembapan dan volume_tanki harus berupa angka.'], 400);
        }
         $user = User::where('device_code', $deviceCode)->first();

        // Cek apakah ada data sensor yang sesuai dengan user_id
        $sensor = MSensor::where('user_id', $deviceCode)->first();

        if (!$sensor) {
            return response()->json(['message' => 'Data sensor tidak ditemukan.'], 404);
        }

        // Update data sensor berdasarkan user_id
        $sensor->update([
            'kelembapan' => $kelembapan,
            'volume_tanki' => $volume_tanki,
        ]);

        return response()->json(['message' => 'Data sensor berhasil diperbarui.']);
    }
}
