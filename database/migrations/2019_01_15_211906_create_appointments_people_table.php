<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentsPeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments_people', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('appointment_id')->unsigned();
            $table->foreign('appointment_id')
                ->references('id')->on('appointments');

            $table->integer('person_id')->unsigned();
            $table->foreign('person_id')
                ->references('id')->on('people');

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
        Schema::dropIfExists('appointments_people');
    }
}
