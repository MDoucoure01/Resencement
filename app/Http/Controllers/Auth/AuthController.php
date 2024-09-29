<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginView()
    {
        return view("components.recensement-unite.auth");
    }

    public function login()
    {
        return redirect()->route('index.page');
    }
}
