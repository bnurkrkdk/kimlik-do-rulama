<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return response()->json(['message' => 'Giriş başarılı'], 200);
        } else {
            return response()->json(['message' => 'Giriş başarısız'], 401);
        }
    }
}
