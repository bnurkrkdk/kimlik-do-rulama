<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;

Route::get('/add-user', [UserController::class, 'createUser']);


class UserController extends Controller
{
    public function createUser()
    {
        // Kullanıcı bilgilerini burada elle girin
        $name = 'John Doe';
        $email = 'john@example.com';
        $password = 'secret123';

        // Yeni kullanıcı oluşturun
        User::createUser($name, $email, $password);

        return 'Kullanıcı oluşturuldu!';
    }
}
