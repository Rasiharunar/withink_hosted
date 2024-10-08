<?php

namespace App\Http\Controllers;
use App\Models\Relay;
use Illuminate\Http\Request;

class relayController extends Controller
{
    public function controlRelay(Request $request)
    {
        $relayId = $request->input('relay_id');
        $state = $request->input('state');

        // Karena hanya ada satu baris data, kita ambil data dengan id 1
        $relay = Relay::find(1);
        if (!$relay) {
            // Jika belum ada data, kita buat baru
            $relay = new Relay();
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
        $relay = Relay::find(1); // Assuming there's only one row with id 1

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
    public function readRelay1()
    {
        $relay = Relay::select('relay1')->first();
        // $maxBatt1 = 60; // Define the maximum value for Batt1
        return response()->json(['relay1' => $relay->relay1]);
    }
    public function readRelay2()
    {
        $relay = Relay::select('relay2')->first();
        // $maxBatt1 = 60; // Define the maximum value for Batt1
        return response()->json(['relay2' => $relay->relay2]);
    }
}

