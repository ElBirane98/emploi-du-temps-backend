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
        $validated = $request->validate([
            'numero_debut_semaine' => 'required|integer',
            'numero_fin_semaine' => 'required|integer',
            'annee' => 'required|integer',
            'type' => 'required|string',
            'cour_id' => 'required|exists:cours,id',
            'professeur_id' => 'required|exists:professeurs,id',
            'salle_id' => 'required|exists:salles,id',
            'creneau_horaire_id' => 'required|exists:creneau_horaires,id',
        ]);

        $seance = Seance::create($validated);
        return new SeanceResource($seance->load(['cours.niveau', 'professeur', 'salle', 'creneauHoraire']));
    }

    public function show(Seance $seance)
    {
        return new SeanceResource($seance->load(['cours.niveau', 'professeur', 'salle', 'creneauHoraire']));
    }

    public function update(Request $request, Seance $seance)
    {
        $validated = $request->validate([
            'numero_debut_semaine' => 'sometimes|required|integer',
            'numero_fin_semaine' => 'sometimes|required|integer',
            'annee' => 'sometimes|required|integer',
            'type' => 'sometimes|required|string',
            'cour_id' => 'sometimes|required|exists:cours,id',
            'professeur_id' => 'sometimes|required|exists:professeurs,id',
            'salle_id' => 'sometimes|required|exists:salles,id',
            'creneau_horaire_id' => 'sometimes|required|exists:creneau_horaires,id',
        ]);

        $seance->update($validated);
        return new SeanceResource($seance->load(['cours.niveau', 'professeur', 'salle', 'creneauHoraire']));
    }

    public function destroy(Seance $seance)
    {
        $seance->delete();
        return response()->noContent();
    }
}
