<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class authAPI extends Controller
{
    public function register(Request $request){
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        $token = $user->createToken('myToken');

        return response()->json([
            'token' => $token->plainTextToken,
            'data' => [
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ]
        ]);
    }

    public function login(Request $request){
        $credential = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (auth()->attempt($credential)) {
            $user = User::where('email',$request->email)->firstOrFail();
            $token = $user->createToken('myToken');

            return response()->json([
                'token' => $token->plainTextToken,
            ]);
        }

        return response()->json([
            'message' => 'Email atau password salah',
        ]);
    }
}
