<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Professeur extends Model
{
    protected $fillable = [
        'nom', 'prenom', 'email', 'specialite', 'grade',
        'telephone', 'numero_immatriculation', 'status', 'departement_id'
    ];

    public function cours()
    {
        return $this->hasMany(Cours::class);
    }

    public function seances()
    {
        return $this->hasMany(Seance::class);
    }

    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }
}
