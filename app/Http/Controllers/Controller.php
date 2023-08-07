<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function createUser()
    {
        User::createUser('abc', 'abc@abc.com', 'abc123');
        return 'Kullanıcı oluşturuldu!';
    }
    public function updateUser(Request $request, $userId)
{
    $user = User::find($userId);

    if (!$user) {
        return 'Kullanıcı bulunamadı!';
    }

    $user->update([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'password' => bcrypt($request->input('password')),
    ]);

    return 'Kullanıcı güncellendi!';
}
}


class AuthController extends Controller
{
    // Giriş yapmak için kullanılan formu gösterir
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Kullanıcı girişini işler
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Kullanıcıyı giriş yapmaya çalışın
        if (Auth::attempt($credentials)) {
            // Başarılı giriş durumu
            return redirect()->intended('/dashboard'); // Yönlendirilecek yer
        } else {
            // Başarısız giriş durumu
            return redirect()->back()->withErrors(['message' => 'Giriş başarısız!']);
        }
    }

}

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
