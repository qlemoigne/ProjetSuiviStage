<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class TypeUtilisateurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $connection = 'ent';
    public function run()
    {
        
        DB::connection('ent')->table('type_utilisateur')->insert([
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
