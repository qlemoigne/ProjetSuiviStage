<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $connection = 'ent';
    public function run()
    {
        DB::connection('ent')->table('menu')->insert([
            [
               'id_application' => 4,
               'lib_titre' => 'Acceuil',
               'lib_route' => '/',
               'ordre' => 1,
           ], 
           [
              'id_application' => 4,
              'lib_titre' => 'Historique',
              'lib_route' => '/',
              'ordre' => 2,
          ], 

          
       ]);
    }
}
