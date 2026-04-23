<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SeanceResource extends JsonResource
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
            'horaire' => [
                'jour' => $this->creneauHoraire->jour,
                'debut' => $this->creneauHoraire->debut,
                'fin' => $this->creneauHoraire->fin,
            ],
            'matiere' => $this->cours->nom,
            'code' => $this->cours->code,
            'enseignant' => $this->professeur->prenom . ' ' . $this->professeur->nom,
            'salle' => $this->salle->nom,
            'classe' => $this->cours->niveau->nom,
            'type' => strtolower($this->type) === 'cm' ? 'cours' : strtolower($this->type),
        ];
    }
}
