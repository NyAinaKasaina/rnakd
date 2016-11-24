<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modifications',function (Blueprint $table){
              $table->increments('id',true);
              $table->string('degre');
              $table->date('date_de_modification');
              $table->text('motif');
              $table->string('idDeveloppeur_PG');
              $table->integer('application_id')->unsigned();
              $table->foreign('application_id')->references('id')->on('applications');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modifications');
    }
}