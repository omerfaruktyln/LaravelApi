<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request)
    {

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json(['success' => 'UYE OLUNDU!'], 200);
    }

    public function index(Request $request)
    {
        if ($request->user()) {
            return $request->user();
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Çıkış işlemi yapıldı'], 200);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (User::where('email', $credentials['email'])->exists()) {
            $user = User::where('email', $credentials['email'])->first();

            if (Hash::check($credentials['password'], $user->password)) {
                $token = $user->createToken('API Token')->plainTextToken;
                return response()->json(['success' => 'Giriş yapıldı!', 'token' => $token], 200);
            } else {
                return response()->json(['error' => 'E-posta adresi veya şifre yanlış.'], 401);
            }
        } else {
            return response()->json(['error' => 'E-posta adresi veya şifre yanlış.'], 401);
        }
    }
}

