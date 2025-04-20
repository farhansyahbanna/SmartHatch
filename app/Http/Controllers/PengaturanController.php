<?php

namespace App\Http\Controllers;

use App\Models\Pengaturan;
use App\Models\Perangkat;
use App\Models\SensorData;
use Illuminate\Http\Request;

class PengaturanController extends Controller
{
    public function index()
    {
        return view('admin.pengaturan');
    }
}
