<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserAuth extends Controller
{
    public function login(Request $request)
{
    $credentials = $request->only('login', 'password');

    if (Auth::attempt($credentials)) {
        // ✅ login réussi
        $request->session()->regenerate();

        return redirect()->intended('/');
    }

    // ❌ login échoué
    return back()->withErrors([
        'login' => 'Nom d\'utilisateur ou mot de passe incorrect',
    ]);
}
    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->intended('/login');
    }
}
