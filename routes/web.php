<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminAuthController;
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


Auth::routes(['verify' => true]);

Route::get('/admin/home', [App\Http\Controllers\AdminAuthController::class, 'index'])->name('home')->middleware('auth:webadmin');
Route::get('/auth/login', [App\Http\Controllers\AdminAuthController::class, 'login'])->name('login');
Route::get('/logout', [App\Http\Controllers\AdminAuthController::class, 'logout'])->name('logout');
Route::post('/auth/login', [App\Http\Controllers\AdminAuthController::class, 'handleLogin'])->name('handleLogin');

Route::get('demo/sendmail', [App\Http\Controllers\SendMailController::class, 'sendmail']);

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('dashboard', [App\Http\Controllers\DashboardAdminController::class, 'show']);
Route::get('admin', [App\Http\Controllers\DashboardAdminController::class, 'show']);

Route::get('admin/delete/{id}', [App\Http\Controllers\AdminUserController::class, 'delete'])->name('delete_user');

Route::get('admin/edit/{id}', [App\Http\Controllers\AdminUserController::class, 'edit'])->name('edit');

Route::post('admin/update/{id}', [App\Http\Controllers\AdminUserController::class, 'update'])->name('update');

Route::get('/post/add', [App\Http\Controllers\PostController::class, 'add']);