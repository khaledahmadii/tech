<?php

namespace App\Http\Controllers;

use App\Models\Intervention;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class dash extends Controller
{
    public function index()
    {

        $current_month = now()->month;
        $current_year = now()->year;


        if (session('user_role') !== 'Administrateur') {
            $interventions_this_day = Intervention::whereDate('date_int', today())
                    ->whereMonth('date_int', $current_month)
                    ->whereYear('date_int', $current_year)
                    ->where('technicien', session('user_id'))
                    ->count();
            $interventions_this_month = Intervention::whereYear('date_int', $current_year)
                                   ->whereMonth('date_int', $current_month)
                                   ->where('technicien', session('user_id'))
                                   ->count();
            $interventions_this_year = Intervention::whereYear('date_int', $current_year)
                                   ->where('technicien', session('user_id'))
                                   ->count();
             $interventions_par_racc = Intervention::select('racc.nom as racc_nom', \DB::raw('count(*) as total'))
                    ->join('racc', 'intervention.type_rac', '=', 'racc.id')
                    ->where('date_int', '>=', now()->subDays(30))
                    ->where('technicien', session('user_id'))
                    ->groupBy('racc.nom')
                    ->get()
                    ->toArray(); // Convert to array for better cache serialization
             $monthly_interventions = Intervention::selectRaw("DATE_FORMAT(date_int, '%Y-%m') AS mois, COUNT(id) AS total")
                    ->where('date_int', '>=', now()->subMonths(6))
                    ->where('technicien', session('user_id'))
                    ->groupBy('mois')
                    ->orderBy('mois', 'asc')
                    ->get()
                    ->toArray();
        }
        else {
         $interventions_this_day = Intervention::whereDate('date_int', today())->count();
        $interventions_this_month = Intervention::whereYear('date_int', $current_year)
                               ->whereMonth('date_int', $current_month)
                               ->count();
        $interventions_this_year = Intervention::whereYear('date_int', $current_year)->count();

        $interventions_par_racc = Intervention::select('racc.nom as racc_nom', \DB::raw('count(*) as total'))
                ->join('racc', 'intervention.type_rac', '=', 'racc.id')
                ->where('date_int', '>=', now()->subDays(30))
                ->groupBy('racc.nom')
                ->get()
                ->toArray(); // Convert to array for better cache serialization

        $monthly_interventions = Intervention::selectRaw("DATE_FORMAT(date_int, '%Y-%m') AS mois, COUNT(id) AS total")
                ->where('date_int', '>=', now()->subMonths(6))
                ->groupBy('mois')
                ->orderBy('mois', 'asc')
                ->get()
                ->toArray();
        }

        //dd($monthly_interventions, $interventions_par_racc, $technicians_count, $interventions_this_year, $interventions_this_month);
        return view('index', compact('interventions_this_month', 'interventions_this_year', 'interventions_this_day',  'interventions_par_racc', 'monthly_interventions', 'interventions_this_day'));
    }
}
