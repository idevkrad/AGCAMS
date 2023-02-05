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
        Schema::create('students', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->smallIncrements('id');
            $table->boolean('is_international')->default(0);
            $table->tinyInteger('course_id')->unsigned()->nullable();
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->tinyInteger('year_id')->unsigned()->nullable();
            $table->foreign('year_id')->references('id')->on('dropdowns')->onDelete('cascade');
            $table->tinyInteger('status_id')->unsigned()->nullable();
            $table->foreign('status_id')->references('id')->on('dropdowns')->onDelete('cascade');
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
        Schema::dropIfExists('students');
    }
};
