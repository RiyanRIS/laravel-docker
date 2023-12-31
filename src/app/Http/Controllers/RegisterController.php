<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $name = $request->input('name');
        $username        = $request->input('username');
        $password     = $request->input('password');

        $user = User::create([
            'name'      => $name,
            'username'     => $username,
            'password'  => Hash::make($password)
        ]);

        if($user) {
            return response()->json([
                'success' => true,
                'message' => 'Register Berhasil!'
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Register Gagal!'
            ], 400);
        }

    }
}
