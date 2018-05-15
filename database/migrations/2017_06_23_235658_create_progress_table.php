<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('progress', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('wound_id')->unsigned();
            $table->integer('image');
            $table->float('area');
            $table->text('comment')->nullable();
            $table->text('advice')->nullable();
            $table->string('status');
            $table->timestamps();

            $table->foreign('wound_id')
                ->references('id')
                ->on('wounds');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('progress');
    }
}
