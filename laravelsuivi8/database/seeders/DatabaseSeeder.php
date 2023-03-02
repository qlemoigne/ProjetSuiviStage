<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // ENT
        $this->call([
            Type::class,
            Utilisateur::class,
            Etape::class,
            Activite::class,
            Participe::class,
            ValidationSeeder::class,
            ApplicationSeeder::class,
            MenuSeeder::class,
            TypeUtilisateurSeeder::class,
            UtilisateurSeeder::class,
            
           
        ]);
        
    }
}
