<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Participe extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('participation')->insert([[
           'id'=> 1,
            'utilisateurs_id'=>1,
            'activites_id'=>1,
        ],
        [
            'id'=> 2,
             'utilisateurs_id'=>2,
             'activites_id'=>1,
         ]
        ]);
       
    }
}


