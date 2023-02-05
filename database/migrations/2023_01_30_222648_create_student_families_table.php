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
        Schema::create('student_families', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->smallIncrements('id');
            $table->json('father');
            $table->json('mother');
            $table->json('spouse');
            $table->json('siblings');
            $table->json('childrens');
            $table->tinyInteger('structure_id')->unsigned()->nullable();
            $table->foreign('structure_id')->references('id')->on('dropdowns')->onDelete('cascade');
            $table->tinyInteger('parent_id')->unsigned()->nullable();
            $table->foreign('parent_id')->references('id')->on('dropdowns')->onDelete('cascade');
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
        Schema::dropIfExists('student_families');
    }
};
