<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Seance;
use App\Models\Cours;
use App\Models\Professeur;
use App\Models\Salle;
use App\Models\CreneauHoraire;
use App\Http\Resources\SeanceResource;
use Illuminate\Http\Request;

class SeanceController extends Controller
{
    public function index()
    {
        return SeanceResource::collection(
            Seance::with(['cours.niveau', 'professeur', 'salle', 'creneauHoraire'])->get()
        );
    }

    public function store(Request $request)
    {
        try {
            // Création directe pour tester
            $seance = Seance::create($request->all());
            return response()->json([
                'message' => 'OK', 
                'data' => [
                    'id' => $seance->id,
                    'message' => 'Séance créée'
                ]
            ], 201);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function show(Seance $seance) { return $seance; }

    public function update(Request $request, Seance $seance)
    {
        try {
            $seance->update($request->all());
            return response()->json(['message' => 'OK']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function destroy(Seance $seance)
    {
        $seance->delete();
        return response()->json(['message' => 'DELETED']);
    }

}

