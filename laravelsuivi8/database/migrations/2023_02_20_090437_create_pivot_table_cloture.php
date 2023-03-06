<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePivotTableCloture extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clotures', function (Blueprint $table) {
            $table->id();
            $table->string('appreciation-eleve');
            $table->string('appreciation-tuteur');
            $table->string('fichier-notation');
            $table->timestamps();
            $table->boolean('status');
        });

        Schema::table('clotures', function (Blueprint $table) {
            $table->unsignedBigInteger('utilisateurs_id');
            $table->foreign('utilisateurs_id')->references('id')->on('utilisateurs')->onDelete('cascade');
            $table->unsignedBigInteger('activites_id');
            $table->foreign('activites_id')->references('id')->on('activites')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pivot_table_cloture');
    }
}
