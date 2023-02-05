<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_infos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->smallIncrements('id');
            $table->date('birthday');
            $table->string('birth_place',250);
            $table->json('information');
            $table->tinyInteger('religion_id')->unsigned()->nullable();
            $table->foreign('religion_id')->references('id')->on('dropdowns')->onDelete('cascade');
            $table->tinyInteger('sex_id')->unsigned()->nullable();
            $table->foreign('sex_id')->references('id')->on('dropdowns')->onDelete('cascade');
            $table->tinyInteger('civil_id')->unsigned()->nullable();
            $table->foreign('civil_id')->references('id')->on('dropdowns')->onDelete('cascade');
            $table->tinyInteger('living_id')->unsigned()->nullable();
            $table->foreign('living_id')->references('id')->on('dropdowns')->onDelete('cascade');
            $table->tinyInteger('ethnic_id')->unsigned()->nullable();
            $table->foreign('ethnic_id')->references('id')->on('dropdowns')->onDelete('cascade');
            $table->smallInteger('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('student_infos');
    }
};
