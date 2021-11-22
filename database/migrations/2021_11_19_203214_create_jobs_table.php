<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('company_id');
            $table->unsignedInteger('workspace_id');
            $table->unsignedInteger('job_type_id');
            $table->unsignedInteger('salary_type_id');
            $table->unsignedInteger('salary_period_id');
            $table->unsignedInteger('application_type_id');
            $table->unsignedInteger('specialty_area_id');

            $table->string('job_title', 100);
            $table->integer('number_hiring');
            $table->integer('weekly_hours');
            $table->integer('minimum_salary');
            $table->integer('maximum_salary');
            $table->date('start_date_application');
            $table->date('end_date_application');
            $table->string('alternate_email', 100);
            $table->boolean('notifications');
            $table->text('job_description');

            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('workspace_id')->references('id')->on('workspaces');
            $table->foreign('job_type_id')->references('id')->on('job_types');
            $table->foreign('salary_type_id')->references('id')->on('salary_types');
            $table->foreign('salary_period_id')->references('id')->on('salary_periods');
            $table->foreign('application_type_id')->references('id')->on('application_types');
            $table->foreign('specialty_area_id')->references('id')->on('specialty_areas');

            $table->dropPrimary();
            $table->primary(['id', 'company_id']);

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
        Schema::dropIfExists('jobs');
    }
}
