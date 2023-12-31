<?php

namespace App\Http\Controllers;
use Laravel\Passport\Passport;
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

       //public function login(Request $request){
//
       //         //dd($request->all());
       //    $login = $request->validate([
       //        'email' => 'required|string',
       //        'password' => 'required|string',
       //    ]);
       //    try {
       //        $authGuard = Auth::guard('api');
       //        //dd($authGuard);
       //        //dd($authGuard->check($login));
       //        if($authGuard->check($login)){
       //         return back()->with('error', 'Giriş başarısız. Lütfen bilgilerinizi kontrol edin.');
       //          $data = 'Invalid Login Credentials';
       //          $code = 401;
       //        } else {
       //            $user = $authGuard->user();
       //            $token = $user->createToken('user')->accessToken;
       //            $code = 200;
       //            $data = [
       //                'user' => $user,
       //                'token' => $token,
       //            ];
       //        }
       //    } catch (Exception $e) {
       //        $data = ['error' => $e->getMessage()];
       //    }
       //    return response()->json($data, $code);
//
       //}
//       if(Auth::check(['email' => $request->username, 'password' => $request->password], $request->remember))
//       {
//
//        $user = Auth::User();
//        $success['token'] =  $request->user()->createToken('MyApp')->accessToken;
//
//        return response()->json(['success' => $success], $this->successStatus);
//
//       }
//       return response()->json(['error'=>'Unauthorised'], 401);

//dd($request->all());
//            $email = $request->input('email');
//            $password = $request->input('password');
//            $name=$request->input('name');
//       if (Auth::check(['email' => $email, 'password' => $password, 'name' => $name])) {
//        $user = Auth::User();
//        $success['token'] =  $request->user()->createToken('MyApp')->accessToken;
//        return response()->json(['success' => $success], $this->successStatus);
//
//          } else {
//
//                  return back()->with('error', 'Giriş başarısız. Lütfen bilgilerinizi kontrol edin.');
//    }
//}
//}
public function login(Request $request)
{
    $email = $request->input('email');
    $password = $request->input('password');

    if (Auth::guard('web')->attempt(['email' => $email, 'password' => $password])) {
        // User login successful
        $user = Auth::user();
        $success['token'] =  $request->user()->createToken('MyApp')->accessToken;
        return response()->json(['success' => $success], $this->successStatus);
    } else {
        // User login failed
        return back()->with('error', 'Giriş başarısız. Lütfen bilgilerinizi kontrol edin.');
    }
}


}
