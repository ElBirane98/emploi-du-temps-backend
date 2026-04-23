<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Professeur;
use App\Models\Salle;
use App\Models\Niveau;
use App\Models\Cours;
use App\Models\Seance;
use App\Models\Departement;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $now = Carbon::now();
        $startOfWeek = (int)$now->isoWeek(); 

        $stats = [
            'classes' => Niveau::count(),
            'salles' => Salle::count(),
            'departements' => Departement::count(),
            'professeurs' => Professeur::count(),
            'seances' => [
                'total' => Seance::count(),
                'cette_semaine' => Seance::where('numero_debut_semaine', '<=', $startOfWeek)
                                        ->where('numero_fin_semaine', '>=', $startOfWeek)
                                        ->count(),
            ],
            'cours' => Cours::count(),
            'filieres' => [
                'count' => Niveau::count(),
                'names' => Niveau::pluck('nom')->take(3)->toArray(),
            ],
            'conflits' => $this->getConflictsCount(),
        ];

        return response()->json($stats);
    }

    private function getConflictsCount()
    {
        // Simple placeholder for conflicts logic
        // In a real scenario, this would check for overlapping times/rooms/profs
        return 0; 
    }
}
