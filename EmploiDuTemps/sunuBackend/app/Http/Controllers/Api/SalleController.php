<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Salle;
use App\Http\Resources\SalleResource;
use Illuminate\Http\Request;

class SalleController extends Controller
{
    public function index()
    {
        return SalleResource::collection(Salle::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'capacite' => 'required|integer',
            'batiment' => 'nullable|string|max:255',
            'type' => 'nullable|string',
            'est_disponible' => 'nullable|boolean',
        ]);

        $salle = Salle::create($validated);
        return new SalleResource($salle);
    }

    public function show(Salle $salle)
    {
        return new SalleResource($salle);
    }

    public function update(Request $request, Salle $salle)
    {
        $validated = $request->validate([
            'nom' => 'sometimes|required|string|max:255',
            'capacite' => 'sometimes|required|integer',
            'batiment' => 'nullable|string|max:255',
            'type' => 'nullable|string',
            'est_disponible' => 'nullable|boolean',
        ]);

        $salle->update($validated);
        return new SalleResource($salle);
    }

    public function destroy(Salle $salle)
    {
        $salle->delete();
        return response()->noContent();
    }
}
