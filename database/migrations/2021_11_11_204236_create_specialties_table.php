<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecialtiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specialties', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->unsignedTinyInteger('specialty_area_id');
            $table->string('specialty', 100);

            $table->foreign('specialty_area_id')->references('id')->on('specialty_areas');
            $table->dropPrimary();
            $table->primary(['id', 'specialty_area_id']);
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
        Schema::dropIfExists('specialties');
    }
}
