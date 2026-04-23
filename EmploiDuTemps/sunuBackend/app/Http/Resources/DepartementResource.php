<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DepartementResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nom' => $this->nom,
            'chef' => $this->chef,
            'effectif_enseignants' => $this->professeurs ? $this->professeurs->count() : 0,
        ];
    }
}
