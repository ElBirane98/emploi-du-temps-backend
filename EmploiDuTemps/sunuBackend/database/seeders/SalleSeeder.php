<?php

namespace Database\Seeders;

use App\Models\Salle;
use Illuminate\Database\Seeder;

class SalleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $salles = [
            ['nom' => 'Salle 101', 'capacite' => 40],
            ['nom' => 'Salle 102', 'capacite' => 30],
            ['nom' => 'Amphi A', 'capacite' => 200],
            ['nom' => 'Amphi B', 'capacite' => 150],
            ['nom' => 'Labo Info 1', 'capacite' => 25],
        ];

        foreach ($salles as $salle) {
            Salle::create($salle);
        }
    }
}
