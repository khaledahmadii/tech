<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\User;
class UserAuth extends Controller
{
public function login(Request $request)
{
    $credentials = $request->only('login', 'password');

    if (Auth::attempt($credentials)) {
        // ✅ login réussi
        $request->session()->regenerate();   // ← GARDE CELLE-CI
        session()->put('user_id', Auth::id());
        session()->put('user_login', Auth::user()->login); // Stocke le login
        //  de l'utilisateur dans la session
        session()->put('user_role', Auth::user()->role); // Stocke le rôle de l'utilisateur dans la session
        // Force le login explicite
        return redirect()->intended('/'); // Redirige vers la page d'accueil ou la page précédente
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
