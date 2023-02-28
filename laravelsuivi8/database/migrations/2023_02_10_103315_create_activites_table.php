<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
	

    public function up()
    {
        Schema::create('activites', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->date('debut');
            $table->date('fin');
            $table->string('adresse_stage');
            $table->string('numero_tuteur_externe');
            $table->string('nom_tuteur_externe');
            $table->string('adresse_mail_tuteur_externe');
            $table->string('thematique');

          //$table->unsignedBigInteger('types_id');
          //$table->foreign('types_id')->references('id')->on('types');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activites');
    }
}
