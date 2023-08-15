<?php

use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::post('/user-login', [AuthController::class, 'login'])->name('user-login');


// routes/web.php dosyasında

Route::post('/login', 'AuthController@login')->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
/*Route::post('/example', [UserController::class, 'showExamplePage']);
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});