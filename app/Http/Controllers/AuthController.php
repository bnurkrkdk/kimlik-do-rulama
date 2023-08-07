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
        
        $plainPassword = $request->input('password');
        $hashedPassword = Hash::make($plainPassword);
        $email = $request->input('email');
        $password = $request->input('password');
        $credentials = $request->only('email', 'password');
        $user = User::where('email', $email)->first();
        dd($plainPassword, $hashedPassword);
        if ($user && Hash::check($plainPassword, $user->password)) {
            // Şifre doğru, giriş başarılı
            // İşlemleri buraya ekleyebilirsiniz
            Session::flash('success', 'Başarıyla giriş yaptınız!');
        } else {
            // Şifre yanlış, giriş başarısız
            // Hata mesajı göster veya işlem yap
            return back()->with('error', 'Giriş başarısız. Lütfen bilgilerinizi kontrol edin.');
        }
        
        /*dd($request->all());*/
        
       /* if (Auth::attempt(['email' => $email, 'password' => $password])) {
            // Kullanıcı giriş yapmıştır, burada yapılacak işlemleri belirleyebilirsiniz
            // Örneğin yönlendirme yapabilir veya başka bir sayfaya geçebilirsiniz
            Session::flash('success', 'Başarıyla giriş yaptınız!');
           /* return redirect('/dashboard');
        } else {
            // Kullanıcı giriş başarısız, hata mesajı gösterebilir veya başka bir işlem yapabilirsiniz
            return back()->with('error', 'Giriş başarısız. Lütfen bilgilerinizi kontrol edin.');
        }*/
    }
}