<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;

// フロント（お問い合わせフォーム）
Route::get('/', [ContactController::class, 'index'])->name('contact.index');
Route::post('/confirm', [ContactController::class, 'confirm'])->name('contact.confirm');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/thank', [ContactController::class, 'thank'])->name('contact.thank');

// ログイン関連
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// 管理画面（ログインが必要）
Route::middleware(['auth'])->group(function () {
  Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');
  Route::get('/admin', [UserController::class, 'index'])->name('admin.index');
  Route::delete('/admin/{id}', [UserController::class, 'destroy'])->name('admin.destroy');
  Route::get('/admin/export', [UserController::class, 'export'])->name('admin.export');
});



// Route::get('/', function () {
//   return view('welcome');
// });