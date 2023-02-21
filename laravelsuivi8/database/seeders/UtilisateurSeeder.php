<?php

use Illuminate\Database\Seeder;

class UtilisateurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('utilisateur')->insert([
            [
                'id_utilisateur' => 3,
                'lib_nom' => 'Fabresse',
                'lib_prenom' => 'Isabelle',
                'id_type_utilisateur' => 2,
                'lib_adr_mail' => 'isabelle.fabresse@imt-lille-douai.fr',
            ]
        ]);
    }
}
