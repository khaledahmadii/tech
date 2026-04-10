<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\intervention;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class Technicien extends Controller
{
    public function index_employe() {
        $current_month = now()->month;
        $current_year = now()->year;
        $techniciens = Intervention::join('user', 'intervention.technicien', '=', 'user.id')
            ->join('tarif', 'intervention.type_rac', '=', 'tarif.id_rac')
            ->where('user.role', 'salarie')
            ->whereYear('date_int', $current_year)
            ->whereMonth('date_int', $current_month)
            ->select(
                'user.id',
                'user.nom',
                'user.prenom',  
                DB::raw('SUM(tarif.prix_salarie) as revenu_total')
            )
            ->groupBy('user.id', 'user.nom', 'user.prenom')
            ->get();
        return view('technicien.employe', compact('techniciens'));
    }

    public function index_auto() {
        $current_month = now()->month;
        $current_year = now()->year;
        $techniciens = Intervention::join('user', 'intervention.technicien', '=', 'user.id')
            ->join('tarif', 'intervention.type_rac', '=', 'tarif.id_rac')
            ->where('user.role', 'auto-entrepreneur')
            ->whereYear('date_int', $current_year)
            ->whereMonth('date_int', $current_month)
            ->select(
                'user.id',
                'user.nom',
                'user.prenom',
                DB::raw('SUM(tarif.prix_salarie) as revenu_total')
            )
            ->groupBy('user.id', 'user.nom', 'user.prenom')
            ->get();
        return view('technicien.auto', compact('techniciens'));
    }
}
