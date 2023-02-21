<?php

use Illuminate\Database\Seeder;

class TypeUtilisateurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_utilisateur')->insert([
            [
                'id_type_utilisateur' => 1,
                'lib_type_utilisateur' => 'Etudiant'
            ],
            [
                'id_type_utilisateur' => 2,
                'lib_type_utilisateur' => 'Personnel'
            ],
            [
                'id_type_utilisateur' => 3,
                'lib_type_utilisateur' => 'Extérieur'
            ],
            [
                'id_type_utilisateur' => 4,
                'lib_type_utilisateur' => 'Audit'
            ]
        ]);
    }
}
