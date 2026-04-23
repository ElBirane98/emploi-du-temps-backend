<?php

namespace Database\Seeders;

use App\Models\Cours;
use App\Models\CreneauHoraire;
use App\Models\Professeur;
use App\Models\Salle;
use App\Models\Seance;
use Illuminate\Database\Seeder;

class SeanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cours = Cours::all();
        $professeurs = Professeur::all();
        $salles = Salle::all();
        $creneaux = CreneauHoraire::all();

        if ($cours->isEmpty() || $professeurs->isEmpty() || $salles->isEmpty() || $creneaux->isEmpty()) {
            return;
        }

        Seance::create([
            'numero_debut_semaine' => 1,
            'numero_fin_semaine' => 12,
            'annee' => 2024,
            'type' => 'CM',
            'cour_id' => $cours[0]->id,
            'professeur_id' => $professeurs[0]->id,
            'salle_id' => $salles[2]->id, // Amphi A
            'creneau_horaire_id' => $creneaux[0]->id, // Lundi 08:00
        ]);

        Seance::create([
            'numero_debut_semaine' => 1,
            'numero_fin_semaine' => 12,
            'annee' => 2024,
            'type' => 'TD',
            'cour_id' => $cours[1]->id,
            'professeur_id' => $professeurs[1]->id,
            'salle_id' => $salles[0]->id, // Salle 101
            'creneau_horaire_id' => $creneaux[5]->id, // Mardi 10:00
        ]);

        Seance::create([
            'numero_debut_semaine' => 1,
            'numero_fin_semaine' => 12,
            'annee' => 2024,
            'type' => 'TP',
            'cour_id' => $cours[2]->id,
            'professeur_id' => $professeurs[3]->id,
            'salle_id' => $salles[4]->id, // Labo Info 1
            'creneau_horaire_id' => $creneaux[10]->id, // Mercredi 14:00
        ]);
    }
}
