<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $current_day = now()->day;
        $interventions_this_day = Cache::remember('interventions_this_day', 600, function () {
            return Intervention::whereDate('date_int', now()->toDateString())->count();
        });
        $interventions_this_month = Cache::remember('interventions_this_month', 600, function () use ($current_year, $current_month) {
            return Intervention::whereYear('date_int', $current_year)
                               ->whereMonth('date_int', $current_month)
                               ->count();
        });
        $interventions_this_year = Cache::remember('interventions_this_year', 600, function () use ($current_year) {
            return Intervention::whereYear('date_int', $current_year)->count();
        });
        $technicians_count = Cache::remember('technicians_count', 600, function () {
            return User::count();
        });
        $interventions_par_racc = Cache::remember('interventions_par_racc', 600, function () {
            return Intervention::select('racc.nom as racc_nom', \DB::raw('count(*) as total'))
                ->join('racc', 'intervention.type_rac', '=', 'racc.id')
                ->where('date_int', '>=', now()->subDays(30))
                ->groupBy('racc.nom')
                ->get()
                ->toArray(); // Convert to array for better cache serialization
        });

        $monthly_interventions = Cache::remember('monthly_interventions', 600, function () {
            return Intervention::selectRaw("DATE_FORMAT(date_int, '%Y-%m') AS mois, COUNT(id) AS total")
                ->where('date_int', '>=', now()->subMonths(6))
                ->groupBy('mois')
                ->orderBy('mois', 'asc')
                ->get()
                ->toArray();
        });

        //dd($monthly_interventions, $interventions_par_racc, $technicians_count, $interventions_this_year, $interventions_this_month);
        return view('index', compact('interventions_this_month', 'interventions_this_year', 'technicians_count', 'interventions_par_racc', 'monthly_interventions', 'interventions_this_day'));
    }
}
