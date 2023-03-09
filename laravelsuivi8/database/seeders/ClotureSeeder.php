<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClotureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clotures')->insert([[
            'id'=> 1,
            'appreciation-eleve'=>'',
            'appreciation-tuteur'=>'',
            'fichier-notation'=> '',
            'activites_id'=>1,
            'utilisateurs_id'=>1,
            'status'=>TRUE,
            ],
            [
                'id'=> 2,
                'appreciation-eleve'=>'',
                'appreciation-tuteur'=>'',
                'fichier-notation'=> '',
                'activites_id'=>2,
                'utilisateurs_id'=>1,
                'status'=>TRUE,
                ],
        ]);
    }
}
