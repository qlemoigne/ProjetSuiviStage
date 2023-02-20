<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePivotTableParticipation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participation', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::table('participation', function (Blueprint $table) {
            $table->unsignedBigInteger('utilisateurs_id');
            $table->foreign('utilisateurs_id')->references('id')->on('utilisateurs');
            $table->unsignedBigInteger('activites_id');
            $table->foreign('activites_id')->references('id')->on('activites');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('participation');
    }
}
