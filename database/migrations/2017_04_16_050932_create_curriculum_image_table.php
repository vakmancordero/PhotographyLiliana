<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCurriculumImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curriculum_image', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('curriculum_id');
            $table->string('name')->nullable();
            $table->string('path')->nullable();
            $table->integer('order')->nullable();
	        $table->foreign('curriculum_id')
		        ->references('id')
		        ->on('curriculum')
		        ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('curriculum_image');
    }
}
