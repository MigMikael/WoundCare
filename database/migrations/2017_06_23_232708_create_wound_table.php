<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWoundTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wounds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('case_id')->unsigned();
            $table->string('site');
            $table->string('status');
            $table->integer('original_image');
            $table->timestamps();

            $table->foreign('case_id')
                ->references('id')
                ->on('cases');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wounds');
    }
}
