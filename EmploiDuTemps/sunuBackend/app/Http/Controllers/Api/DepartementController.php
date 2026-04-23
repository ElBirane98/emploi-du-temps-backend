<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Departement;
use App\Http\Resources\DepartementResource;
use Illuminate\Http\Request;

class DepartementController extends Controller
{
    public function index()
    {
        return DepartementResource::collection(Departement::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'chef' => 'nullable|string|max:255',
        ]);

        $departement = Departement::create($validated);
        return new DepartementResource($departement);
    }

    public function show(Departement $departement)
    {
        return new DepartementResource($departement);
    }

    public function update(Request $request, Departement $departement)
    {
        $validated = $request->validate([
            'nom' => 'sometimes|required|string|max:255',
            'chef' => 'nullable|string|max:255',
        ]);

        $departement->update($validated);
        return new DepartementResource($departement);
    }

    public function destroy(Departement $departement)
    {
        $departement->delete();
        return response()->noContent();
    }
}
