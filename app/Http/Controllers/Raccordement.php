<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\racc;
use App\Models\Tarif;
class Raccordement extends Controller
{
    public function index() {
        $raccs = racc::all();
        return view('racc.index', compact('raccs'));
    }
    public function create() {
        $racc = racc::create([
            'nom' => request('nom'),
        ]);
        return redirect()->back()->with('success', 'Raccordement créé avec succès');
    }
    public function update(Request $request) {
        $request->validate([
            'id' => 'required|exists:racc,id',
            'nom' => 'nullable|string|max:255',
        ]); 
        $racc = racc::find($request->id);
        $racc->update([
            'nom' => $request->nom,
        ]);
        return redirect()->back()->with('success', 'Raccordement mis à jour avec succès');
    }

    public function destroy($id) {
        $racc = racc::find($id);
        if ($racc) {
            Tarif::where('id_rac', $id)->delete();
            $racc->delete();
            return redirect()->back()->with('success', 'Raccordement et ses tarifs liés supprimés avec succès');
        } else {
            return redirect()->back()->with('error', 'Raccordement non trouvé');
        }
    }
}
