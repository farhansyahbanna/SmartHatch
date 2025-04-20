<?php

namespace App\Http\Controllers;

use App\Models\Aktor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LupaPasswordController extends Controller
{
    public function showForm()
    {
        return view('auth.lupapassword');
    }

    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = Aktor::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('/login')->with('status', 'Password berhasil direset. Silakan login.');
    }
}
