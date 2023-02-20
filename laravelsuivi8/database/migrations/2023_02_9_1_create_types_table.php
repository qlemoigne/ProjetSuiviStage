<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('types', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('libelle');
            $table->timestamps();
        });

        Schema::table('activites', function (Blueprint $table) {
            $table->unsignedBigInteger('types_id');
          $table->foreign('types_id')->references('id')->on('types');
        });

        Schema::table('etapes', function (Blueprint $table) {
            $table->unsignedBigInteger('types_id');
          $table->foreign('types_id')->references('id')->on('types');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('types');
    }
}
