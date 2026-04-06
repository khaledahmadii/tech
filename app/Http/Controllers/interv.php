<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Intervention;
class interv extends Controller
{
    public static function getAll() {
        $techs = Intervention::join('user', 'intervention.technicien', '=', 'user.id')
            ->join('prestataire', 'user.presta', '=', 'prestataire.id')
            ->join('racc', 'intervention.type_rac', '=', 'racc.id')
            ->select(
                'intervention.id as intervention_id',
                'user.id as technicien_id',
                'intervention.type_rac',
                'intervention.jeton',
                'intervention.heure',
                'intervention.notre',
                'intervention.valid',
                'intervention.date_int',
                'user.nom as technicien_nom',
                'user.prenom as technicien_prenom',
                'prestataire.id as prestataire_id',
                'prestataire.nom as prestataire_nom',
                'racc.nom as racc_nom'
            )
            ->get();
        return $techs;
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

    public static function ajouter(array $data) {
        return Intervention::create([
            'technicien' => $data['technicien'],
            'type_rac' => $data['type_rac'],
            'jeton' => $data['jeton'],
            'heure' => $data['heure'],
            'notre' => $data['notre'],
            'valid' => $data['valid'],
        ]);
    }

    public static function supprimer($id) {
        return Intervention::destroy($id);
    }
}
