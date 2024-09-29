<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::post("store/user",[UserController::class,"store"])->name("user.create");

Route::get("",[AuthController::class,"loginView"])->name("login.page");
Route::get("/user/create",[UserController::class,"createView"])->name("create.page");
Route::get("/user/index",[UserController::class,"index"])->name("index.page");
Route::post("user/login",[AuthController::class,"login"])->name("connect.page");
Route::delete('/clients/{client}', [UserController::class, 'destroy'])->name('clients.destroy');
