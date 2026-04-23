<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Niveau extends Model
{
    protected $fillable = ['nom', 'niveau', 'departement_id'];

    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }

    public function cours()
    {
        return $this->hasMany(Cours::class);
    }
}
