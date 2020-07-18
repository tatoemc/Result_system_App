<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() 
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();  
            $table->string('mark');
            $table->string('grad');
            $table->unsignedBigInteger('dept_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('year_id');
            $table->unsignedBigInteger('subject_id');
            $table->unsignedBigInteger('grade_id');
            $table->unsignedBigInteger('semester_id');
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
        Schema::dropIfExists('results');
    }
}
