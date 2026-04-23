<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FiliereResource;
use App\Models\Filiere;
use Illuminate\Http\Request;

class FiliereController extends Controller
{
    public function index()
    {
        return FiliereResource::collection(Filiere::with('departement')->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'libelle' => 'required|string|max:255',
            'departement_id' => 'required|exists:departements,id',
        ]);

        $filiere = Filiere::create($validated);

        return new FiliereResource($filiere);
    }

    public function show(Filiere $filiere)
    {
        return new FiliereResource($filiere->load('departement'));
    }

    public function update(Request $request, Filiere $filiere)
    {
        $validated = $request->validate([
            'nom' => 'string|max:255',
            'libelle' => 'string|max:255',
            'departement_id' => 'exists:departements,id',
        ]);

        $filiere->update($validated);

        return new FiliereResource($filiere);
    }

    public function destroy(Filiere $filiere)
    {
        $filiere->delete();
        return response()->noContent();
    }
}
