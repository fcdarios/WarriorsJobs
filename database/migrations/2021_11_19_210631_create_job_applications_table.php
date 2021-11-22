<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_applications', function (Blueprint $table) {
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('job_id');
            $table->unsignedBigInteger('candidate_id');
            $table->unsignedTinyInteger('status_id');
            $table->date('application_date');

            $table->foreign(['company_id', 'job_id'])->references(['company_id', 'id'])->on('jobs');
            $table->foreign('candidate_id')->references('id')->on('candidates');
            $table->foreign('status_id')->references('id')->on('job_application_statuses');
            $table->primary(['company_id', 'job_id', 'candidate_id']);
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
        Schema::dropIfExists('job_applications');
    }
}
