<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Intervention;
use App\Models\Racc;
use App\Models\User;

class interv extends Controller
{

    public static function getAll() {
        $techs = Intervention::join('user', 'intervention.technicien', '=', 'user.id')
            ->join('racc', 'intervention.type_rac', '=', 'racc.id')
            ->join('user as t', 'intervention.notre', '=', 't.id', 'left')
            ->select(
                'intervention.id as intervention_id',
                'user.id as technicien_id',
                'intervention.type_rac',
                'intervention.jeton',
                'intervention.heure',
                DB::raw("CASE WHEN intervention.notre LIKE '%non%' THEN 'non' WHEN t.id IS NOT NULL THEN CONCAT(t.nom, ' ', t.prenom) ELSE intervention.notre END AS notre_grille"),
                'intervention.valid',
                'intervention.date_int',
                'user.nom as technicien_nom',
                'user.prenom as technicien_prenom',
                'racc.nom as racc_nom'      
            )
            ->orderBy('intervention.date_int', 'DESC')
            ->get();
            
        $tech_list = User::all();
        $racc = Racc::all();
        return view('intervention.index', compact('techs', 'racc', 'tech_list'));
    }

    public static function parmoistech($id) {
        return Intervention::selectRaw("DATE_FORMAT(date_int, '%Y-%m') AS mois, COUNT(id) AS total")
            ->whereRaw('date_int >= DATE_SUB(CURDATE(), INTERVAL 6 MONTH)')
            ->where('technicien', $id)
            ->groupBy('mois')
            ->orderBy('mois', 'asc')
            ->get();
    }

    public static function getpartech($id) {
        return Intervention::select('intervention.id as iid', 'jeton', 'heure', 'notre', 'valid', 'date_int', 'racc.nom as tracc')
            ->join('racc', 'intervention.type_rac', '=', 'racc.id')
            ->where('technicien', $id)
            ->get();
    }

    public static function ajouter(Request $data) {
        Intervention::create([
            'technicien' => $data['technicien'],
            'type_rac' => $data['type_rac'],
            'jeton' => $data['jeton'],
            'heure' => $data['heure'],
            'notre' => empty($data['notre']) ? 'non' : $data['notre'],
            'valid' => $data['valid'],
        ]);
        return redirect()->back()->with('success', 'Intervention ajoutée avec succès');

    }

    public function update(Request $request) {
        $request->validate([
            'id' => 'required|integer|exists:intervention,id',
            'type_rac' => 'nullable|integer|exists:racc,id',
            'jeton' => 'nullable|string|max:255',
            'heure' => 'nullable|string|max:255',
        ]);

        Intervention::where('id', $request->id)->update([
            'type_rac' => $request->type_rac,
            'jeton' => $request->jeton,
            'heure' => $request->heure,
        ]);

        return redirect()->back()->with('success', 'Intervention modifiée avec succès');
    }

    public static function supprimer($id) {
        Intervention::destroy($id);
        return redirect()->back()->with('success', 'Intervention supprimée avec succès');
    }
}
