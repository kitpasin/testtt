<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Termwind\Components\Raw;

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

Route::get('/home',[HomeController::class, 'HomePage']);
Route::get('/home/{id}',[HomeController::class, 'HomePage']);

Route::get('/profile',[ProfileController::class, 'profilePage']);
Route::post('/api/profile/create',[ProfileController::class, 'createProfile']);
Route::delete('/api/profile/{id}',[ProfileController::class, 'deleteProfile']);

Route::get('product', [ProductController::class, 'ProductPage']);
Route::post('/api/product/create',[ProductController::class, 'createProduct']);
Route::get('/api/product/{id}', [ProductController::class, 'editProduct']);
Route::delete('/api/product/{id}',[ProductController::class, 'deleteProduct']);
Route::put('/api/product/{id}', [ProductController::class, 'updateProduct']);

Route::get('login', [LoginController::class, 'LoginPage']);

Route::get('register', [RegisterController::class, 'RegisterPage']);
Route::post('/api/register/create', [RegisterController::class, 'registerUser']);
Route::delete('/api/register/{id}',[RegisterController::class, 'deleteUser']);