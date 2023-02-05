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
        Schema::create('appointments', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->smallIncrements('id');
            $table->datetime('date');
            $table->boolean('is_seen')->default(0);
            $table->boolean('is_updated')->default(0);
            $table->tinyInteger('purpose_id')->unsigned()->nullable();
            $table->foreign('purpose_id')->references('id')->on('dropdowns')->onDelete('cascade');
            $table->tinyInteger('method_id')->unsigned()->nullable();
            $table->foreign('method_id')->references('id')->on('dropdowns')->onDelete('cascade');
            $table->tinyInteger('status_id')->unsigned()->nullable();
            $table->foreign('status_id')->references('id')->on('dropdowns')->onDelete('cascade');
            $table->smallInteger('counselor_id')->unsigned()->index();
            $table->foreign('counselor_id')->references('id')->on('users')->onDelete('cascade');
            $table->smallInteger('student_id')->unsigned()->index();
            $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('appointments');
    }
};
