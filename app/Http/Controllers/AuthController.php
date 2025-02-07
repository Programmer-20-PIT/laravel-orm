<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;   
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\ValidationException; // Impor ValidationException

class AuthController extends Controller
{
    public function login(Request $request){
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|password'
        ]);

        $user = User::where('email', $validated['email'])
                    // ->where('password', $validated['password'])
                    ->first();

        if(!$user || !Hash::check($validated['password'],$user->password)){
            throw ValidationException::withMessages([
                ['message' => 'email atau password yang dimasukkan salah']
            ]);

        $token= $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'data'=> $user,
            'message' => 'Login Berhasil',
            'token' => $token,
        ]);
        }
    }

    public function logout(Request $request){

    }
}
