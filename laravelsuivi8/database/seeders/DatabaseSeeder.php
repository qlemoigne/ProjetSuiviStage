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
            ApplicationSeeder::class,
            MenuSeeder::class,
            TypeUtilisateurSeeder::class,
            UtilisateurSeeder::class,
            Activite::class,
            Etape::class,
            Participe::class,
            Type::class,
            Utilisateur::class,
        ]);
        
    }
}
