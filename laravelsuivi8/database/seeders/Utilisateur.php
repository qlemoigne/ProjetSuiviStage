<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Utilisateur extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('utilisateurs')->insert([[
           'id'=> 1,
            'nom'=>'bukielski',
            'prenom'=>'Robin',
            'telephone'=>'0782051968',
            'mail'=>'bukielskirobin@gmail.com',
            'profil'=>'1',

        ],
        [
            'id'=> 2,
            'nom'=>'seneclauze',
            'prenom'=>'baptiste',
            'telephone'=>'0782051968',
            'mail'=>'seneclauzebaptiste@gmail.com',
            'profil'=>'1',
        ]
    ]);
    }
}

