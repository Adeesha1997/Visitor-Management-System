<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubUserController;
use App\Http\Controllers\DepartmentController;


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

Route::post('custom-login', [CustomAuthController::class, 'custom_login'])->name('login.custom');

Route::get('dashboard', [CustomAuthController::class, 'dashboard'])->name('dashboard');

Route::get('logout', [CustomAuthController::class, 'logout'])->name('logout');

Route::get('registration', [CustomAuthController::class, 'registration'])->name('register');

Route::post('custom-registration', [CustomAuthController::class, 'custom_registration'])->name('register.custom');


Route::get('profile',[ProfileController::class,'index'])->name('profile');

Route::post('profile-edit',[ProfileController::class, 'edit_validation'])->name('profile.edit_validation');


Route::get('subUser',[SubUserController::class,'index'])->name('sub.user');

Route::get('subUser-fetchall', [SubUserController::class, 'fetch_all'])->name('sub_user.fetchall');

Route::get('subUser-add', [SubUserController::class, 'add'])->name('sub_user.add');

Route::post('subUser-add_validation', [SubUserController::class, 'add_validation' ])->name('sub_user.add_validation');

Route::get('subUser-edit{id}',[SubUserController::class, 'edit'])->name('edit');

Route::post('subUser-edit_validation', [SubUserController::class, 'edit_validation'] )->name('sub_user.edit_validation');

Route::get('subUser-delete/{id}', [SubUserController::class, 'delete'])->name('delete');

Route::get('department', [DepartmentController::class, 'index'])->name('department');

Route::get('department-fetchall', [DepartmentController::class, 'fetchall'])->name('department.fetchall');

Route::get('department-add', [DepartmentController::class, 'add'])->name('department.add');

Route::post('department-add_validation', [DepartmentController::class , 'add_validation'])->name('department.add_validation');

Route::get('department-edit{id}', [DepartmentController::class, 'edit'])->name('department.edit');

Route::post('department-edit_validation' , [DepartmentController::class , 'edit_validation'])->name('department.edit_validation');

