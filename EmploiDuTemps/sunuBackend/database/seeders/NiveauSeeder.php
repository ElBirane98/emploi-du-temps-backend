<?php

namespace Database\Seeders;

use App\Models\Niveau;
use Illuminate\Database\Seeder;

class NiveauSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $niveaux = [
            ['nom' => 'L1'],
            ['nom' => 'L2'],
            ['nom' => 'L3'],
            ['nom' => 'M1'],
            ['nom' => 'M2'],
        ];

        foreach ($niveaux as $niveau) {
            Niveau::create($niveau);
        }
    }
}
