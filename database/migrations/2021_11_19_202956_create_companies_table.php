<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->unsignedInteger('giro_id');
            $table->unsignedInteger('sector_id');
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('state_id');
            $table->unsignedBigInteger('city_id');
            $table->string('name', 100);
            $table->integer('number_employees');
            $table->string('rfc', 13);
            $table->string('business_name', 100);
            $table->string('website');
            $table->text('description');
            $table->string('zip_code', 15);

            $table->foreign('id')->references('id')->on('users');
            $table->foreign('giro_id')->references('id')->on('giros');
            $table->foreign('sector_id')->references('id')->on('sectors');
            $table->foreign(['country_id', 'state_id', 'city_id'])->references(['country_id', 'state_id', 'id'])->on('cities');
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
        Schema::dropIfExists('companies');
    }
}
