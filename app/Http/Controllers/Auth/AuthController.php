<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginView()
    {
        return view("components.recensement-unite.auth");
    }

    public function login(Request $request)
    {

        $authenticated = Auth::attempt([
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        ]);

        if($authenticated) {
            return redirect()->route('index.page');
        }
        return back()->withErrors([
            'error' => 'Email ou mot de passe invalide'
        ]);
        
    }
}
