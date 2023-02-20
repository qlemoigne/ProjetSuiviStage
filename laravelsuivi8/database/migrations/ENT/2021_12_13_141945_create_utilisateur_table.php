<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUtilisateurTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('utilisateur', function (Blueprint $table) {
            $table->integer('id_utilisateur')->autoIncrement(); 

            $table->string('lib_nom', 255);
            $table->string('lib_prenom', 255);
            
            $table->integer('id_type_utilisateur');    // Personnel, étudiant, ... 
            $table->foreign('id_type_utilisateur')->references('id_type_utilisateur')->on('type_utilisateur');  //clé étrangère
            
            $table->string('lib_adr_mail', 100)->unique();

        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('utilisateur');
    }
}
