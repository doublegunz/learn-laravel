<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\ChangePasswordController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/user', UserController::class);
Route::delete('users_mass_destroy', [UserController::class, 'massDestroy'])->name('user.mass_destroy');

Route::get('change_password', [ChangePasswordController::class, 'index'])->name('auth.change_password');
Route::put('change_password', [ChangePasswordController::class, 'changePassword'])->name('auth.change_password');
