<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultSubjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('result_subject', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('result_id')->unsigned();
            $table->unsignedBigInteger('subject_id')->unsigned();

            $table->foreign('result_id')->references('id')->on('results');
            $table->foreign('subject_id')->references('id')->on('subjects');
            
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
        Schema::dropIfExists('result_subject');
    }
}
