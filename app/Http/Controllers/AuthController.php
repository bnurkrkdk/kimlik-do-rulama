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
            
            if (Auth::attempt($credentials)) {
                // Kullanıcı giriş yapmıştır, burada yapılacak işlemleri belirleyebilirsiniz
                // Örneğin yönlendirme yapabilir veya başka bir sayfaya geçebilirsiniz
               /* return redirect('/dashboard');*/
               Session::flash('success', 'Başarıyla giriş yaptınız!');
            } else {
                // Kullanıcı giriş başarısız, hata mesajı gösterebilir veya başka bir işlem yapabilirsiniz
                return back()->with('error', 'Giriş başarısız. Lütfen bilgilerinizi kontrol edin.');
            }
        }
        

    
}