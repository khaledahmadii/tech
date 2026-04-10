<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Prestataire;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */


    public function index()
    {   
        $users = User::all();
        $presta = Prestataire::all();
        return view('profile.index', compact('users', 'presta'));
    }
    public function show()
    {
        $profile = User::findOrFail(session('user_id'));
        return view('profile.profile', compact('profile'));
    }

    public function create()
    {
        $users = User::create([
            'nom' => request('nom'),
            'prenom' => request('prenom'),
            'login' => request('login'),
            'presta' => request('presta'),
            'role' => request('role'),
            'password' => bcrypt(request('password')),
        ]);
            Cache::forget('tech_list');
        return redirect()->back()->with('success', 'Compte créé avec succès');
    }
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(request $request)
    {   
        $user = user::where('id', request('id'))->first()
        ->update([
            'nom' => request('nom'),
            'prenom' => request('prenom'),
            'login' => request('login'),
            'presta' => request('presta'),
            'role' => request('role'),
        ]);
        Cache::forget('tech_list');

        return redirect()->back()->with('success', 'Compte mis à jour avec succès');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:user,id',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::find($request->id);
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->back()->with('success', 'Mot de passe changé avec succès');
    }

    /**
     * Delete the user's account.
     */
    public function destroy($id)
    {


        user::destroy($id);
        Cache::forget('tech_list');
        return redirect()->back()->with('success', 'Compte supprimée avec succès');
    }
}
