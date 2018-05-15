<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cases', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id')->unsigned();
            $table->integer('doctor_id')->unsigned();
            $table->string('disease');
            $table->string('status');
            $table->dateTime('next_appointment');
            $table->timestamps();

            $table->foreign('patient_id')
                ->references('id')
                ->on('patients');
            $table->foreign('doctor_id')
                ->references('id')
                ->on('doctors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cases');
    }
}
