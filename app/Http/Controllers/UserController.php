<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;



class MyUserController extends Controller
{

    public function showExamplePage()
    {
        return view('example');
    }

}
