<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FiliereResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nom' => $this->nom,
            'libelle' => $this->libelle,
            'departement' => $this->departement ? $this->departement->nom : null,
            'departement_id' => $this->departement_id,
        ];
    }
}
