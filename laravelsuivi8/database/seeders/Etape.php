<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Etape extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('etapes')->insert([[

           'id'=> 1,
            'libelle'=>'appel tuteur',
            'echeance'=>30,
            'importance' => true,
            'types_id'=>1,
            'etapes_id'=>1,
            'resume'=>'appeler le tuteur interne pour savoir comment ça se passe',

        ],
        [
            'id'=> 2,
            'libelle'=>'notation rapport',
            'echeance'=>60,
            'importance' => false,
            'types_id'=>1,  
            'etapes_id'=>1, 
            'resume'=>'corriger le rapport de stage et rentrer la note sur isis'
        ]
    ]);
    }
}
