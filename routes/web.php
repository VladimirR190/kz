<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

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
Route::get('/register', [UserController::class, 'index'])->name('user.register');
Route::post('register', [UserController::class, 'store'])->name('user.register.post');
Route::get('/login', [UserController::class, 'log'])->name('user.login');
Route::post('/login', [AuthController::class, 'auth'])->name('user.login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('user.logout.post');
Route::get('/main', [MainController::class, 'index'])->name('main.index');
Route::post('/main', [MainController::class, 'zaklad'])->name('main.index.post');
Route::post('/create/post', [UserController::class,'car'])->name('user.create.car.post');
Route::get('/admin', [AdminController::class, 'admin'])->middleware(AdminMiddleware::class);