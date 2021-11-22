<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupplementalPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplemental_payments', function (Blueprint $table) {
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('job_id');
            $table->unsignedBigInteger('type_supplemental_payment_id');

            $table->foreign(['company_id', 'job_id'])->references(['company_id', 'id'])->on('jobs');
            $table->foreign('type_supplemental_payment_id')->references('id')->on('type_supplemental_payments');
            $table->primary(['company_id', 'job_id', 'type_supplemental_payment_id']);

//            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supplemental_payments');
    }
}
