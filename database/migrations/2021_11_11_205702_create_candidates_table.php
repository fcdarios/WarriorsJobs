<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('state_id');
            $table->unsignedBigInteger('city_id');
            $table->string('zip_code', 30);
            $table->dateTime('date_birthdate');
            $table->string('phone_number', 15);
            $table->unsignedTinyInteger('gender_id');

            $table->foreign('gender_id')->references('id')->on('genders');
            $table->foreign(['country_id', 'state_id', 'city_id'])->references(['country_id', 'state_id', 'id'])->on('cities');
            $table->foreign('id')->references('id')->on('users');
            $table->primary('id');
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
        Schema::dropIfExists('candidates');
    }
}
