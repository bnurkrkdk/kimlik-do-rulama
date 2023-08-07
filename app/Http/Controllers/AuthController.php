<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        // Kullanıcıyı giriş yapmaya çalışın
        if (Auth::attempt($credentials))
        {
            // Başarılı giriş durumu
            return redirect()->intended('/dashboard'); // Yönlendirilecek yer
        }

         else {
            // Başarısız giriş durumu
            return redirect()->back()->withErrors(['message' => 'Giriş başarısız!']);
        }
    }
}