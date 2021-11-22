<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResumeSpecialitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resume_specialities', function (Blueprint $table) {
            $table->unsignedBigInteger('resume_id');
            $table->unsignedTinyInteger('specialty_area_id');
            $table->unsignedTinyInteger('specialty_id');

            $table->foreign('resume_id')->references('id')->on('resumes');
            $table->foreign(['specialty_id','specialty_area_id'])->references(['id', 'specialty_area_id'])->on('specialties');

            $table->primary(['resume_id', 'specialty_id', 'specialty_area_id']);

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
        Schema::dropIfExists('resume_specialities');
    }
}
