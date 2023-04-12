<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('pages.auth.login');
});

Route::get('login' , [CustomAuthController::class, 'index'])->name('login');
Route::post('login-custom', [CustomAuthController::class, 'custom_login'])->name('login.custom');
Route::get('dashboard', [CustomAuthController::class, 'dashboard'])->name('dashboard');
Route::get('logout', [CustomerAuthController::class, 'logout'])->name('logout');

Route::get('registration', [CustomAuthController::class, 'registration'])->name('register');

Route::post('custom-registration', [CustomAuthController::class, 'custom_registration'])->name('register.custom');

