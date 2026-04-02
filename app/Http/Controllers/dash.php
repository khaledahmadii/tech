<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Intervention;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class dash extends Controller
{
    public function index()
    {
        $total_interventions = Intervention::count();

        $current_month = now()->month;
        $current_year = now()->year;
        $interventions_this_month = Intervention::whereYear('date_int', $current_year)
                                               ->whereMonth('date_int', $current_month)
                                               ->count();
        $interventions_this_year = Intervention::whereYear('date_int', $current_year)->count();
        $technicians_count = User::count();
        $interventions_par_racc = Intervention::select('type_rac', \DB::raw('count(*) as total'))
            ->where('date_int', '>=', now()->subDays(30))
            ->groupBy('type_rac')
            ->get();

        $monthly_interventions = DB::select("SELECT DATE_FORMAT(i.date_int, '%Y-%m') AS mois, COUNT(i.id) AS total
            FROM intervention i
            WHERE i.date_int >= DATE_SUB(CURDATE(), INTERVAL 6 MONTH)
            GROUP BY mois
            ORDER BY mois ASC");
        dd($monthly_interventions, $interventions_par_racc);
        return view('dash', compact('total_interventions', 'interventions_this_month', 'interventions_this_year', 'technicians_count', 'interventions_par_racc', 'monthly_interventions'));
    }
}
