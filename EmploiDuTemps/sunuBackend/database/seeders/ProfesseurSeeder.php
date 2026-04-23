<?php

namespace Database\Seeders;

use App\Models\Professeur;
use Illuminate\Database\Seeder;

class ProfesseurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $professeurs = [
            [
                'nom' => 'DIOP',
                'prenom' => 'Abdoulaye',
                'email' => 'abdoulaye.diop@example.com',
                'specialite' => 'Mathématiques',
                'telephone' => '771234567',
                'numero_immatriculation' => 'P001',
                'status' => 'actif'
            ],
            [
                'nom' => 'FALL',
                'prenom' => 'Moussa',
                'email' => 'moussa.fall@example.com',
                'specialite' => 'Informatique',
                'telephone' => '772345678',
                'numero_immatriculation' => 'P002',
                'status' => 'actif'
            ],
            [
                'nom' => 'SARR',
                'prenom' => 'Fatou',
                'email' => 'fatou.sarr@example.com',
                'specialite' => 'Physique',
                'telephone' => '773456789',
                'numero_immatriculation' => 'P003',
                'status' => 'actif'
            ],
            [
                'nom' => 'NDIAYE',
                'prenom' => 'Ibrahima',
                'email' => 'ibrahima.ndiaye@example.com',
                'specialite' => 'Algorithmique',
                'telephone' => '774567890',
                'numero_immatriculation' => 'P004',
                'status' => 'actif'
            ],
        ];

        foreach ($professeurs as $professeur) {
            Professeur::create($professeur);
        }
    }
}
