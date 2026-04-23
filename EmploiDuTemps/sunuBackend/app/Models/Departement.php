<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    protected $fillable = ['nom', 'chef'];

    public function professeurs()
    {
        return $this->hasMany(Professeur::class);
    }
}
