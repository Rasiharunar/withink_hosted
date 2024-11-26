<?php

namespace App\Http\Controllers;
use App\Models\Relay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RelayController extends Controller
{
    public function controlRelay(Request $request)
    {
        $relayId = $request->input('relay_id');
        $state = $request->input('state');
        // Ambil relay berdasarkan ID pengguna yang sedang login
        $user = Auth::user();
        $relay = Relay::where('user_id', $user->id)->first();
        // Karena hanya ada satu baris data, kita ambil data dengan id 1

        if (!$relay) {
            // Jika belum ada data, kita buat baru
            $relay = new Relay();
            $relay->user_id = $user->id; // Set user_id
        }

        if ($relayId == 1) {
            $relay->relay1 = $state ? '1' : '0';
        } elseif ($relayId == 2) {
            $relay->relay2 = $state ? '1' : '0';
        }
        $relay->save();

        return response()->json(['message' => 'Relay updated successfully'], 200);
    }
    public function getRelayData()
    {
        // Retrieve the relay data
        $user = Auth::user();
        $relay = Relay::where('user_id', $user->id)->first();
        // If no data found, create default values
        if (!$relay) {
            $relay = new Relay();
            $relay->relay1 = '0';
            $relay->relay2 = '0';
            $relay->save();
        }

        // Return the relay data as JSON
        return response()->json([
            'relay1' => $relay->relay1,
            'relay2' => $relay->relay2,
        ]);

    }
    public function getRelayDataEsp(Request $request)
    {
        $deviceId = $request->input('deviceid');

    // Temukan relay berdasarkan device_id
        $relay = Relay::where('id', $deviceId)->first();

        $relay = Relay::find(1);
        // Jika tidak ada data relay, buat data default
        if (!$relay) {
            $relay = new Relay();
            // $relay->user_id = $user->id; // Set user_id
            $relay->relay1 = '0';
            $relay->relay2 = '0';
            $relay->save();
        }

        // Kembalikan data relay sebagai JSON
        return response()->json([
            'relay1' => $relay->relay1,
            'relay2' => $relay->relay2,
        ]);
    }
    public function readRelay1()
    {
        $user = Auth::user();
        $relay = Relay::where('user_id', $user->id)->first();
        return response()->json(['relay1' => $relay->relay1]);
    }
    public function readRelay2()
    {
        $user = Auth::user();
        $relay = Relay::where('user_id', $user->id)->first();
        // $relay = Relay::select('relay2')->first();
        // $maxBatt1 = 60; // Define the maximum value for Batt1
        return response()->json(['relay2' => $relay->relay2]);
    }
}

