<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CreneauHoraire;
use App\Http\Resources\CreneauHoraireResource;
use Illuminate\Http\Request;

class CreneauHoraireController extends Controller
{
    public function index()
    {
        return CreneauHoraireResource::collection(CreneauHoraire::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'jour' => 'required|string',
            'debut' => 'required|string',
            'fin' => 'required|string',
        ]);

        $creneau = CreneauHoraire::create($validated);
        return new CreneauHoraireResource($creneau);
    }

    public function show(CreneauHoraire $creneau)
    {
        return new CreneauHoraireResource($creneau);
    }

    public function update(Request $request, CreneauHoraire $creneau)
    {
        $validated = $request->validate([
            'jour' => 'sometimes|required|string',
            'debut' => 'sometimes|required|string',
            'fin' => 'sometimes|required|string',
        ]);

        $creneau->update($validated);
        return new CreneauHoraireResource($creneau);
    }

    public function destroy(CreneauHoraire $creneau)
    {
        $creneau->delete();
        return response()->noContent();
    }
}
