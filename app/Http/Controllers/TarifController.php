<?php

namespace App\Http\Controllers;
use App\Models\Tarif;
use App\Models\Racc;
use Illuminate\Http\Request;

class TarifController extends Controller
{
    public function index() {
        $tarifs = Tarif::with('rac')->get();
        $raccSansTarif = Racc::whereNotIn('id', Tarif::select('id_rac'))->get();
        return view('tarif.index', compact('tarifs', 'raccSansTarif'));
    }

    public function create() {
        $tarif = Tarif::create([
            'id_rac' => request('id_rac'),
            'prix_salarie' => request('prix_salarie'),
            'prix_auto' => request('prix_auto'),
        ]);
        return redirect()->back()->with('success', 'Tarif créé avec succès');
    }
    public function update(Request $request) {
        $request->validate([
            'id' => 'required|exists:tarif,id',
            'id_rac' => 'nullable|integer|exists:racc,id',
            'prix_salarie' => 'nullable|numeric',
            'prix_auto' => 'nullable|numeric',
        ]);

        Tarif::where('id', $request->id)->update([
            'id_rac' => $request->id_rac,
            'prix_salarie' => $request->prix_salarie,
            'prix_auto' => $request->prix_auto,
        ]);

        return redirect()->back()->with('success', 'Tarif mis à jour avec succès');
    }

    public function destroy($id) {
        $tarif = Tarif::find($id);
        if ($tarif) {
            $tarif->delete();
            return redirect()->back()->with('success', 'Tarif supprimé avec succès');
        } else {
            return redirect()->back()->with('error', 'Tarif non trouvé');
        }
    }
}
