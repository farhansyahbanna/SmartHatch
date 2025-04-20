<?php

namespace App\Http\Controllers;

use App\Models\Sensor;
use App\Models\SensorData;
use Illuminate\Http\Request;

class SensorController extends Controller
{
    public function getLatestData()
    {
        return response()->json([
            'suhu' => SensorData::latest()->first()->suhu,
            'kelembaban' => SensorData::latest()->first()->kelembaban,
            'waktu' => now()->format('H:i:s')
        ]);
    }

    
}
