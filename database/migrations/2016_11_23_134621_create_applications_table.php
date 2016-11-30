<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
              $table->increments('id',true);
              $table->string('nom',20);
              $table->string('description');
              $table->text('details');
              $table->date('date_de_creation');
              $table->string('thumbnail')->unique();
              $table->string('mail_PG',50);
              $table->integer('type_id')->unsigned();
              $table->foreign('type_id')->references('id')->on('types');
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
        Schema::dropIfExists('applications');
    }
}
