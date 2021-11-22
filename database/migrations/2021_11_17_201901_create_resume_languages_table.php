<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResumeLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resume_languages', function (Blueprint $table) {
            $table->unsignedBigInteger('resume_id');
            $table->unsignedInteger('language_id');

            $table->foreign('resume_id')->references('id')->on('resumes');
            $table->foreign('language_id')->references('id')->on('languages');

            $table->primary(['resume_id', 'language_id']);

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
        Schema::dropIfExists('resume_languages');
    }
}
