<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Departement;
use App\Models\Professeur;
use App\Models\Salle;
use App\Models\Niveau;
use App\Models\Cours;
use App\Models\Seance;
use App\Models\CreneauHoraire;
use App\Models\User;
use App\Models\Filiere;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 0. Utilisateur Admin
        User::create([
            'name' => 'Administrateur',
            'email' => 'admin@sunu-emploi.sn',
            'password' => Hash::make('password'),
            'role' => 'admin'
        ]);

        // 0.1 Utilisateur Visiteur
        User::create([
            'name' => 'Utilisateur Lambda',
            'email' => 'user@sunu-emploi.sn',
            'password' => Hash::make('password'),
            'role' => 'visiteur'
        ]);

        // 1. Départements
        $depInfo = Departement::create(['nom' => 'Informatique', 'chef' => 'Dr. Ndiaye']);
        $depMath = Departement::create(['nom' => 'Mathématiques', 'chef' => 'Pr. Traoré']);
        $depGest = Departement::create(['nom' => 'Gestion', 'chef' => 'Mme. Fall']);

        // 1.1 Filières
        Filiere::create(['nom' => 'GDIL', 'libelle' => 'Génie de l\'Informatique et du Logiciel', 'departement_id' => $depInfo->id]);
        Filiere::create(['nom' => 'INFO', 'libelle' => 'Informatique Générale', 'departement_id' => $depInfo->id]);
        Filiere::create(['nom' => 'MATHS', 'libelle' => 'Mathématiques Appliquées', 'departement_id' => $depMath->id]);
        Filiere::create(['nom' => 'GEST', 'libelle' => 'Gestion des Entreprises', 'departement_id' => $depGest->id]);

        // 2. Niveaux
        $l1 = Niveau::create(['nom' => 'L1-INFO', 'niveau' => 'Licence 1', 'departement_id' => $depInfo->id]);
        $l2 = Niveau::create(['nom' => 'L2-INFO', 'niveau' => 'Licence 2', 'departement_id' => $depInfo->id]);
        $l3 = Niveau::create(['nom' => 'L3-INFO', 'niveau' => 'Licence 3', 'departement_id' => $depInfo->id]);
        $m1 = Niveau::create(['nom' => 'M1-GDIL', 'niveau' => 'Master 1', 'departement_id' => $depInfo->id]);

        // 3. Salles
        $s1 = Salle::create(['nom' => 'Amphi A', 'capacite' => 200, 'type' => 'amphitheatre', 'batiment' => 'Bâtiment Principal', 'est_disponible' => true]);
        $s2 = Salle::create(['nom' => 'Salle 101', 'capacite' => 40, 'type' => 'salle_cours', 'batiment' => 'Aile Ouest', 'est_disponible' => true]);
        Salle::create(['nom' => 'Labo Info 1', 'capacite' => 30, 'type' => 'labo_info', 'batiment' => 'Bloc Technique', 'est_disponible' => true]);
        Salle::create(['nom' => 'Labo TP', 'capacite' => 25, 'type' => 'labo_tp', 'batiment' => 'Bloc Technique', 'est_disponible' => true]);

        // 4. Professeurs
        $p1 = Professeur::create([
            'nom' => 'Ba', 'prenom' => 'Amadou', 'email' => 'ba@univ.sn', 
            'specialite' => 'Algorithmique', 'grade' => 'Professeur',
            'numero_immatriculation' => 'EMP001', 'departement_id' => $depInfo->id
        ]);
        $p2 = Professeur::create([
            'nom' => 'Sarr', 'prenom' => 'Fatou', 'email' => 'sarr@univ.sn', 
            'specialite' => 'Base de données', 'grade' => 'Maître de Conférences',
            'numero_immatriculation' => 'EMP002', 'departement_id' => $depInfo->id
        ]);
        $p3 = Professeur::create([
            'nom' => 'CAMARA', 'prenom' => 'Lamine', 'email' => 'camara.lamine@ugb.edu', 
            'specialite' => 'IA', 'grade' => 'Enseignant',
            'numero_immatriculation' => 'EMP003', 'departement_id' => $depInfo->id
        ]);

        // 5. Cours
        $c1 = Cours::create([
            'nom' => 'Introduction à Java', 
            'code' => 'INF101', 
            'description' => 'Bases de la POO', 
            'semestre' => 1, 'credits' => 4, 'volume_horaire' => 45,
            'filiere_id' => 1, 'niveau_id' => $m1->id,
            'professeur_id' => $p1->id
        ]);
        $c2 = Cours::create([
            'nom' => 'Analyse Mathématique', 
            'code' => 'MAT101', 
            'description' => 'Calcul intégral', 
            'semestre' => 1, 'credits' => 6, 'volume_horaire' => 60,
            'filiere_id' => 3, 'niveau_id' => $m1->id,
            'professeur_id' => $p2->id
        ]);

        // 6. Créneaux Horaires
        $cr1 = CreneauHoraire::create(['jour' => 'Lundi', 'debut' => '08:00', 'fin' => '10:00']);
        $cr2 = CreneauHoraire::create(['jour' => 'Lundi', 'debut' => '10:00', 'fin' => '12:00']);
        $cr3 = CreneauHoraire::create(['jour' => 'Mardi', 'debut' => '08:00', 'fin' => '10:00']);
        $cr4 = CreneauHoraire::create(['jour' => 'Mercredi', 'debut' => '14:00', 'fin' => '16:00']);

        // 7. Séances
        Seance::create([
            'numero_debut_semaine' => 1, 'numero_fin_semaine' => 52, 'annee' => 2026, 'type' => 'CM',
            'cour_id' => $c1->id, 'professeur_id' => $p1->id, 'salle_id' => $s1->id, 'creneau_horaire_id' => $cr1->id
        ]);
        Seance::create([
            'numero_debut_semaine' => 1, 'numero_fin_semaine' => 52, 'annee' => 2026, 'type' => 'TD',
            'cour_id' => $c2->id, 'professeur_id' => $p2->id, 'salle_id' => $s2->id, 'creneau_horaire_id' => $cr2->id
        ]);
        Seance::create([
            'numero_debut_semaine' => 1, 'numero_fin_semaine' => 52, 'annee' => 2026, 'type' => 'TP',
            'cour_id' => $c1->id, 'professeur_id' => $p1->id, 'salle_id' => $s2->id, 'creneau_horaire_id' => $cr3->id
        ]);
    }
}
