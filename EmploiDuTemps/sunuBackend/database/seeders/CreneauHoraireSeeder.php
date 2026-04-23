<?php

namespace Database\Seeders;

use App\Models\CreneauHoraire;
use Illuminate\Database\Seeder;

class CreneauHoraireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $creneaux = [
            ['debut' => '08:00:00', 'fin' => '10:00:00', 'jour' => 'Lundi'],
            ['debut' => '10:00:00', 'fin' => '12:00:00', 'jour' => 'Lundi'],
            ['debut' => '14:00:00', 'fin' => '16:00:00', 'jour' => 'Lundi'],
            ['debut' => '16:00:00', 'fin' => '18:00:00', 'jour' => 'Lundi'],
            
            ['debut' => '08:00:00', 'fin' => '10:00:00', 'jour' => 'Mardi'],
            ['debut' => '10:00:00', 'fin' => '12:00:00', 'jour' => 'Mardi'],
            ['debut' => '14:00:00', 'fin' => '16:00:00', 'jour' => 'Mardi'],
            ['debut' => '16:00:00', 'fin' => '18:00:00', 'jour' => 'Mardi'],
            
            ['debut' => '08:00:00', 'fin' => '10:00:00', 'jour' => 'Mercredi'],
            ['debut' => '10:00:00', 'fin' => '12:00:00', 'jour' => 'Mercredi'],
            ['debut' => '14:00:00', 'fin' => '16:00:00', 'jour' => 'Mercredi'],
            ['debut' => '16:00:00', 'fin' => '18:00:00', 'jour' => 'Mercredi'],
            
            ['debut' => '08:00:00', 'fin' => '10:00:00', 'jour' => 'Jeudi'],
            ['debut' => '10:00:00', 'fin' => '12:00:00', 'jour' => 'Jeudi'],
            ['debut' => '14:00:00', 'fin' => '16:00:00', 'jour' => 'Jeudi'],
            ['debut' => '16:00:00', 'fin' => '18:00:00', 'jour' => 'Jeudi'],
            
            ['debut' => '08:00:00', 'fin' => '10:00:00', 'jour' => 'Vendredi'],
            ['debut' => '10:00:00', 'fin' => '12:00:00', 'jour' => 'Vendredi'],
            ['debut' => '14:00:00', 'fin' => '16:00:00', 'jour' => 'Vendredi'],
            ['debut' => '16:00:00', 'fin' => '18:00:00', 'jour' => 'Vendredi'],
            
            ['debut' => '08:00:00', 'fin' => '10:00:00', 'jour' => 'Samedi'],
            ['debut' => '10:00:00', 'fin' => '12:00:00', 'jour' => 'Samedi'],
        ];

        foreach ($creneaux as $creneau) {
            CreneauHoraire::create($creneau);
        }
    }
}
