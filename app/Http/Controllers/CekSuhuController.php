<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CekSuhuController extends Controller
{
    public function index()
    {
        return view('admin.ceksuhu');
    }
}
