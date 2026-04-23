<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{
    protected $fillable = [
        'nom', 'code', 'description', 'semestre', 'credits', 
        'volume_horaire', 'filiere_id', 'niveau_id', 'professeur_id'
    ];

    public function filiere()
    {
        return $this->belongsTo(Filiere::class);
    }

    public function niveau()
    {
        return $this->belongsTo(Niveau::class);
    }

    public function professeur()
    {
        return $this->belongsTo(Professeur::class);
    }

    public function seances()
    {
        return $this->hasMany(Seance::class);
    }
}
