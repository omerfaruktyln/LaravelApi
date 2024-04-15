<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    public function create()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $response = Http::post('http://localhost:8000/api/register', [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        
        if ($response->successful()) 
        {
            return redirect()->route('login')->with(['RegisterSuccess' => 'Üye kaydı başarılı!'], 200);
        }
        else
        {
            return back()->with(['RegisterFailed' => 'Üye kaydı başarısız!'], $response->status());
        }
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
        $cookie = cookie()->forget('token');
        return redirect()->route('login')->withCookie($cookie);
    }

    public function sigin() {
        return view('login');
    }

    public function login(Request $request)
    {
        $response = Http::post('http://localhost:8000/api/login', [
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if ($response->successful()) {
            $token = $response['token']; 
            $cookie = cookie('token', $token, 7200); 
            return redirect()->route('product.index')->with(['success' => 'Giriş yapıldı!', 'token' => $token], 200)->cookie($cookie);
        } else {
            return back()->with(['error' => 'E-posta adresi veya şifre yanlış.'], $response->status());
        }

        return redirect('/');;
    }
}




