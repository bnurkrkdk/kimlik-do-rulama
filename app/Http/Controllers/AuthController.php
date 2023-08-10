<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;



class AuthController extends Controller{
//{        public function login(Request $request)
//        {
//            $plainPassword = $request->input('password');
//            $hashedPassword = Hash::make($plainPassword);
//            dd($plainPassword, $hashedPassword);
//            dd($request->all());
//            
//            $email = $request->input('email');
//            $password = $request->input('password');
//
//            if (Auth::check(['email' => $email, 'password' => $password])) {
//          // Kullanıcı giriş yapmıştır, burada yapılacak işlemleri belirleyebilirsiniz             Session::flash('success', 'Başarıyla giriş yaptınız!');
//          /* return redirect('/dashboard');*/
//      } else {
//          // Kullanıcı giriş başarısız, hata mesajı gösterebilir veya başka bir işlem yapabilirsiniz
//          return back()->with('error', 'Giriş başarısız. Lütfen bilgilerinizi kontrol edin.');
//      }
//     /* $email = $request->input('email');          $password = $request->input('password');
//      $plainPassword = $request->input('password');
//      $hashedPassword = Hash::make($plainPassword);
//      dd($plainPassword, $hashedPassword);
//      dd($request->all());*/
//            
//            /*if (Auth::guard('api')->attempt($hashedPassword,$email)) {
//                // Kullanıcı giriş yapmıştır, burada yapılacak işlemleri belirleyebilirsiniz
//                Session::flash('success', 'Başarıyla giriş yaptınız!');
//                /* return redirect('/dashboard');*/
//            /*} else {
//                // Kullanıcı giriş başarısız, hata mesajı gösterebilir veya başka bir işlem yapabilirsiniz
//                return back()->with('error', 'Giriş başarısız. Lütfen bilgilerinizi kontrol edin.');
//        //    }*/       }
        
       public function login(Request $request){
           $login = $request->validate([
               'email' => 'required|string',
               'password' => 'required|string',
           ]);
           try {
               $authGuard = Auth::guard('api');
               if(!$authGuard->check($login)){
                Passport::flash('success', 'Başarıyla giriş yaptınız!');
                  // $data = 'Invalid Login Credentials';
                  // $code = 401;
               } else {
                   $user = $authGuard->user();
                   $token = $user->createToken('user')->accessToken;
                   $code = 200;
                   $data = [
                       'user' => $user,
                       'token' => $token,
                   ];
               }
           } catch (Exception $e) {
               $data = ['error' => $e->getMessage()];
           }
           return response()->json($data, $code);
       }
    
}