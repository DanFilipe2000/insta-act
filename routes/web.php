<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

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

// Rotas de login:

Route::get('/login', [UserController::class, 'login']);
Route::post('/signin', [UserController::class, 'signin']);

// Rotas de registro:

Route::get('/register', [UserController::class, 'register']);
Route::post('/signup', [UserController::class, 'signup']);

// Rotas para Home:

Route::get('/', [HomeController::class, 'dashboard']);

// Rotas para posts:

Route::get('/posts/create', [PostController::class, 'create']);
Route::post('/posts/store', [PostController::class, 'store']);
