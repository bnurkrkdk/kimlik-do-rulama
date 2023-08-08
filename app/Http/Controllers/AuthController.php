<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;



class AuthController extends Controller
{ 
        public function login(Request $request)
        {
            /*dd($plainPassword, $hashedPassword);*/
            dd($request->all());
            $credentials = $request->only('email', 'password');
            
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                // Kullanıcı giriş yapmıştır, burada yapılacak işlemleri belirleyebilirsiniz
                Session::flash('success', 'Başarıyla giriş yaptınız!');
                /* return redirect('/dashboard');*/
            } else {
                // Kullanıcı giriş başarısız, hata mesajı gösterebilir veya başka bir işlem yapabilirsiniz
                return back()->with('error', 'Giriş başarısız. Lütfen bilgilerinizi kontrol edin.');
            }
            
        }
        

    
}