<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CreneauHoraire extends Model
{
    protected $fillable = ['jour', 'debut', 'fin'];

    public function seances()
    {
        return $this->hasMany(Seance::class);
    }
}
