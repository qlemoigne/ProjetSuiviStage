<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePivotTableValidation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('validation', function (Blueprint $table) {
            $table->id();
            $table->boolean('status');
            $table->timestamps();
        });

        Schema::table('validation', function (Blueprint $table) {
            $table->unsignedBigInteger('utilisateurs_id');
            $table->foreign('utilisateurs_id')->references('id')->on('utilisateurs')->onDelete('cascade');
            $table->unsignedBigInteger('activites_id');
            $table->foreign('activites_id')->references('id')->on('activites')->onDelete('cascade');
            $table->unsignedBigInteger('etapes_id');
            $table->foreign('etapes_id')->references('id')->on('etapes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pivot_table_validation');
    }
}
