<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

     /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function check_login(Request $request)
    {
        $username      = $request->input('username');
        $password   = $request->input('password');

        if(Auth::guard('web')->attempt(['username' => $username, 'password' => $password])) {
            return response()->json([
                'success' => true
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Login Gagal!'
            ], 401);
        }

    }
}
