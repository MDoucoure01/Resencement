<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ClientsExport;


Route::get("login", [AuthController::class, "loginView"])
    ->name("login.page")
    ->middleware('guest');

Route::post("user/login", [AuthController::class, "login"])->name("connect.page");

Route::group(['middleware' => ['auth']], function () {
    Route::post("store/user", [UserController::class, "store"])->name("user.create");
    Route::get("/user/create", [UserController::class, "createView"])->name("create.page");
    Route::get("/user/index", [UserController::class, "index"])->name("index.page");
    Route::delete('/clients/{client}', [UserController::class, 'destroy'])->name('clients.destroy');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/clients/export', function () {
        return Excel::download(new ClientsExport, 'clients.xlsx');
    })->name('clients.export');
    // Route::get('users/{id}/edit',[UserController::class, "ReturEditView"])->name("users.edit");
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
});

Route::fallback(function () {
    if (auth()->check()) {
        return redirect()->route('index.page');
    }
    return redirect()->route('login.page');
});
