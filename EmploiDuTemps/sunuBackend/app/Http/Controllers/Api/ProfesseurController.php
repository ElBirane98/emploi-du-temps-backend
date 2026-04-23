<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Professeur;
use App\Http\Resources\ProfesseurResource;
use Illuminate\Http\Request;

class ProfesseurController extends Controller
{
    public function index()
    {
        return ProfesseurResource::collection(Professeur::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:professeurs',
            'specialite' => 'required|string|max:255',
            'telephone' => 'nullable|string',
            'numero_immatriculation' => 'required|string|unique:professeurs',
            'status' => 'nullable|in:actif,inactif',
            'departement_id' => 'required|exists:departements,id',
            'grade' => 'nullable|string'
        ]);

        $professeur = Professeur::create($validated);
        return new ProfesseurResource($professeur->load('departement'));
    }

    public function show(Professeur $professeur)
    {
        return new ProfesseurResource($professeur->load('departement'));
    }

    public function update(Request $request, Professeur $professeur)
    {
        $validated = $request->validate([
            'nom' => 'sometimes|required|string|max:255',
            'prenom' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|unique:professeurs,email,' . $professeur->id,
            'specialite' => 'sometimes|required|string|max:255',
            'telephone' => 'nullable|string',
            'numero_immatriculation' => 'sometimes|required|string|unique:professeurs,numero_immatriculation,' . $professeur->id,
            'status' => 'nullable|in:actif,inactif',
            'departement_id' => 'sometimes|required|exists:departements,id',
            'grade' => 'nullable|string'
        ]);

        $professeur->update($validated);
        return new ProfesseurResource($professeur->load('departement'));
    }

    public function destroy(Professeur $professeur)
    {
        $professeur->delete();
        return response()->noContent();
    }
}
