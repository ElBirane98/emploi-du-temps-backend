<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seance extends Model
{
    protected $fillable = [
        'numero_debut_semaine', 'numero_fin_semaine', 'annee', 'type',
        'cour_id', 'professeur_id', 'salle_id', 'creneau_horaire_id'
    ];

    public function cours()
    {
        return $this->belongsTo(Cours::class, 'cour_id');
    }

    public function professeur()
    {
        return $this->belongsTo(Professeur::class);
    }

    public function salle()
    {
        return $this->belongsTo(Salle::class);
    }

    public function creneauHoraire()
    {
        return $this->belongsTo(CreneauHoraire::class);
    }
}
