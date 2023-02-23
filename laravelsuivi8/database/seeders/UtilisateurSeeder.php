<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UtilisateurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $connection = 'ent';
    public function run()
    {
        DB::connection('ent')->table('utilisateur')->insert([
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
