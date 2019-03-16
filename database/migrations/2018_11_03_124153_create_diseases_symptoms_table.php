<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiseasesSymptomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diseases_symptoms', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('disease_id')->unsigned();
            $table->foreign('disease_id')->references('id')
            ->on('diseases')->onDelete('cascade');
            $table->integer('symptom_id')->unsigned();
            $table->foreign('symptom_id')->references('id')
            ->on('symptoms')->onDelete('cascade');
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
        Schema::dropIfExists('diseases_symptoms');
    }
}
