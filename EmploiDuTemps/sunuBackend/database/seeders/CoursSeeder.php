<?php

namespace Database\Seeders;

use App\Models\Cours;
use App\Models\Niveau;
use App\Models\Professeur;
use Illuminate\Database\Seeder;

class CoursSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $l1 = Niveau::where('nom', 'L1')->first();
        $l2 = Niveau::where('nom', 'L2')->first();
        $l3 = Niveau::where('nom', 'L3')->first();

        $p1 = Professeur::first();
        $p2 = Professeur::skip(1)->first();

        $cours = [
            [
                'nom' => 'Algorithmique 1',
                'code' => 'ALG1',
                'description' => 'Introduction aux algorithmes',
                'niveau_id' => $l1->id,
                'professeur_id' => $p1->id,
            ],
            [
                'nom' => 'Base de données',
                'code' => 'BDD1',
                'description' => 'Introduction aux bases de données relationnelles',
                'niveau_id' => $l2->id,
                'professeur_id' => $p2->id,
            ],
            [
                'nom' => 'Programmation Web',
                'code' => 'WEB1',
                'description' => 'HTML, CSS, JavaScript et PHP',
                'niveau_id' => $l3->id,
                'professeur_id' => $p1->id,
            ],
        ];

        foreach ($cours as $cour) {
            Cours::create($cour);
        }
    }
}
