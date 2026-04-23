<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfesseurResource extends JsonResource
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
            'prenom' => $this->prenom,
            'email' => $this->email,
            'specialite' => $this->specialite,
            'grade' => $this->grade ?? 'Enseignant',
            'status' => $this->status,
            'actif' => $this->status === 'actif',
            'departement' => $this->departement ? $this->departement->nom : 'Département Inconnu',
            'departement_id' => $this->departement_id,
            'telephone' => $this->telephone,
            'numero_immatriculation' => $this->numero_immatriculation,
        ];
    }
}
