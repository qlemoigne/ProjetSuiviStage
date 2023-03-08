<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtapesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etapes', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->string('resume');
            $table->integer('echeance');
            $table->boolean('importance');
            $table->timestamps();
        });

        Schema::table('etapes', function (Blueprint $table) {
            $table->unsignedBigInteger('etapes_id');
          $table->foreign('etapes_id')->references('id')->on('etapes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('etapes');
    }
}
