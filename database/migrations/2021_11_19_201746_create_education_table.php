<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('resume_id');
            $table->unsignedInteger('academic_degree_id');
            $table->string('institution_name', 100);
            $table->string('career', 100);
            $table->date('start_date');
            $table->date('end_date');
            $table->boolean('active');

            $table->foreign('resume_id')->references('id')->on('resumes');
            $table->foreign('academic_degree_id')->references('id')->on('academic_degrees');

            $table->dropPrimary();
            $table->primary(['id', 'resume_id']);
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
        Schema::dropIfExists('education');
    }
}
