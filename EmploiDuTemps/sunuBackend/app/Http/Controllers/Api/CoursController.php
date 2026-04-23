<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cours;
use App\Http\Resources\CoursResource;
use Illuminate\Http\Request;

class CoursController extends Controller
{
    public function index()
    {
        return CoursResource::collection(Cours::with(['niveau', 'professeur', 'filiere'])->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'code' => 'required|string|unique:cours',
            'description' => 'nullable|string',
            'semestre' => 'nullable|integer',
            'credits' => 'nullable|integer',
            'volume_horaire' => 'nullable|integer',
            'filiere_id' => 'nullable|exists:filieres,id',
            'niveau_id' => 'required|exists:niveaux,id',
            'professeur_id' => 'required|exists:professeurs,id',
        ]);

        $cours = Cours::create($validated);
        return new CoursResource($cours->load(['niveau', 'professeur', 'filiere']));
    }

    public function show(Cours $cours)
    {
        return new CoursResource($cours->load(['niveau', 'professeur', 'filiere']));
    }

    public function update(Request $request, Cours $cours)
    {
        $validated = $request->validate([
            'nom' => 'sometimes|required|string|max:255',
            'code' => 'sometimes|required|string|unique:cours,code,' . $cours->id,
            'description' => 'nullable|string',
            'semestre' => 'nullable|integer',
            'credits' => 'nullable|integer',
            'volume_horaire' => 'nullable|integer',
            'filiere_id' => 'nullable|exists:filieres,id',
            'niveau_id' => 'sometimes|required|exists:niveaux,id',
            'professeur_id' => 'sometimes|required|exists:professeurs,id',
        ]);

        $cours->update($validated);
        return new CoursResource($cours->load(['niveau', 'professeur', 'filiere']));
    }

    public function destroy(Cours $cours)
    {
        $cours->delete();
        return response()->noContent();
    }
}
