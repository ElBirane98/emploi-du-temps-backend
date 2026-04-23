<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CoursResource extends JsonResource
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
            'code' => $this->code,
            'description' => $this->description,
            'semestre' => $this->semestre,
            'credits' => $this->credits,
            'volume_horaire' => $this->volume_horaire,
            'filiere' => $this->filiere ? $this->filiere->nom : 'Général',
            'filiere_id' => $this->filiere_id,
            'niveau' => $this->niveau ? [
                'id' => $this->niveau->id,
                'niveau' => $this->niveau->nom,
            ] : null,
            'professeur' => $this->professeur ? [
                'id' => $this->professeur->id,
                'nom' => $this->professeur->nom,
                'prenom' => $this->professeur->prenom,
            ] : null,
        ];
    }
}
