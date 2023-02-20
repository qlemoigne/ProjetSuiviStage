<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu', function (Blueprint $table) {
            $table->integer('id_menu')->autoIncrement();

            $table->integer('id_application');
            $table->foreign('id_application')->references('id_application')->on('application');  //clé étrangère

            $table->integer('id_menu_sup')->nullable();
            $table->foreign('id_menu_sup')->references('id_menu')->on('menu');  //clé étrangère

            $table->string('lib_titre', 100);
            $table->string('lib_route', 100);
            $table->string('lib_lien', 100)->nullable()->default(null);

            $table->integer('id_type_utilisateur')->nullable()->default(null);
            $table->foreign('id_type_utilisateur')->references('id_type_utilisateur')->on('type_utilisateur');

            $table->integer('ordre');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu');
    }
}
