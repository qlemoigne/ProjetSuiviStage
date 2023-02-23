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
           'id'=> 1,
            'debut'=>'2023-06-24',
            'fin'=>'2024-05-11',
            'adresse_stage'=>'185 rue léon blum',
            'numero_tuteur_externe'=>'07850556541',
            'resume'=>'stage de L1',
            'types_id'=>1,

        ]);
       
    }
}

