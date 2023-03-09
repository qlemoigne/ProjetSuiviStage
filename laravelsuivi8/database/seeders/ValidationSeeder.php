<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ValidationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('validations')->insert([[
            'utilisateurs_id'=> 1,
            'status'=> TRUE,
            'activites_id'=>1,
            'etapes_id'=>1,
        ],
        [
            'utilisateurs_id'=> 1,
            'status'=> FALSE,
            'activites_id'=>1,
            'etapes_id'=>2,
        ],
        [
            'utilisateurs_id'=> 1,
            'status'=> TRUE,
            'activites_id'=>2,
            'etapes_id'=>3,
        ],
        [
            'utilisateurs_id'=> 1,
            'status'=> TRUE,
            'activites_id'=>2,
            'etapes_id'=>4,
        ],
        [
            'utilisateurs_id'=> 1,
            'status'=> TRUE,
            'activites_id'=>2,
            'etapes_id'=>5,
        ]
        ]);
        //
    }
}
