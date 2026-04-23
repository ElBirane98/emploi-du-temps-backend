<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Niveau;
use App\Http\Resources\NiveauResource;

class NiveauController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return NiveauResource::collection(Niveau::with('departement')->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255|unique:niveaux,nom',
            'niveau' => 'nullable|string|max:255',
            'departement_id' => 'nullable|exists:departements,id',
        ]);

        $niveau = Niveau::create($validated);
        return new NiveauResource($niveau->load('departement'));
    }

    public function show(Niveau $niveau)
    {
        return new NiveauResource($niveau->load('departement'));
    }

    public function update(Request $request, Niveau $niveau)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255|unique:niveaux,nom,' . $niveau->id,
            'niveau' => 'nullable|string|max:255',
            'departement_id' => 'nullable|exists:departements,id',
        ]);

        $niveau->update($validated);
        return new NiveauResource($niveau->load('departement'));
    }

    public function destroy(Niveau $niveau)
    {
        $niveau->delete();
        return response()->noContent();
    }
}
