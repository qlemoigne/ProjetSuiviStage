<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Activite extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('activites')->insert([
            [
           'id'=> 1,
            'debut'=>'2023-06-24',
            'fin'=>'2024-05-11',
            'adresse_stage'=>'185 rue léon blum',
            'numero_tuteur_externe'=>'07850556541',
            'adresse_mail_tuteur_externe'=>'jean.dupont@gmail.com',
            'nom_tuteur_externe'=>'jean dupont',
            'thematique'=>'stage de L1',
            'types_id'=>1,
            'entreprise'=>'SNCF'
            ],
            [
                'id'=> 2,
                'debut'=>'2023-01-24',
                'fin'=>'2024-02-11',
                'adresse_stage'=>'17 rue de la poterie',
                'numero_tuteur_externe'=>'0647589612',
                'adresse_mail_tuteur_externe'=>'deroulersaxel@gmail.com',
                'nom_tuteur_externe'=>'axel deroulers',
                'thematique'=>'stage de L3',
                'types_id'=>2,
                'entreprise'=>'EDF'   
            ]

        ]);
       
    }
}

