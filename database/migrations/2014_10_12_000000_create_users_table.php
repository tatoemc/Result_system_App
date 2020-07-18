<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void  

     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name',191);
            $table->string('universit_id')->unique()->default('emp');
            $table->string('user_type',10)->default('stu');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->default('$2y$10$4z1W27WZrd3GOPuD5smGe.vED7/piDY3vCflCO4xo6eQizGppCGe6');
            $table->string('gender');
            $table->string('images',255)->nullable(); 
            $table->unsignedBigInteger('dept_id'); 
            $table->unsignedBigInteger('grade_id')->default('1');
            $table->unsignedBigInteger('semester_id')->default('1'); 
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
