<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
           Schema::table('users', function(Blueprint $table) {
                $table->foreign('dept_id')->references('id')->on('depts')
                            ->onDelete('restrict')
                            ->onUpdate('restrict');
            });
          Schema::table('users', function(Blueprint $table) {
                $table->foreign('grade_id')->references('id')->on('grades')->onUpdate('cascade')->onDelete('cascade');
                            
            });
          Schema::table('users', function(Blueprint $table) {
                $table->foreign('semester_id')->references('id')->on('semesters')->onUpdate('cascade')->onDelete('cascade');
                            
            });
     
          Schema::table('semesters', function(Blueprint $table) {
                $table->foreign('grade_id')->references('id')->on('grades')
                            ->onDelete('restrict')
                            ->onUpdate('restrict');
            });
        Schema::table('results', function(Blueprint $table) {
                $table->foreign('user_id')->references('id')->on('users')
                            ->onDelete('restrict')
                            ->onUpdate('restrict');
            });
         Schema::table('results', function(Blueprint $table) {
                $table->foreign('year_id')->references('id')->on('years')
                            ->onDelete('restrict')
                            ->onUpdate('restrict');
            });
         Schema::table('results', function(Blueprint $table) {
                $table->foreign('subject_id')->references('id')->on('subjects')
                            ->onDelete('restrict')
                            ->onUpdate('restrict');
            });
         Schema::table('results', function(Blueprint $table) {
                $table->foreign('grade_id')->references('id')->on('grades')
                            ->onDelete('restrict')
                            ->onUpdate('restrict');
            });
         Schema::table('results', function(Blueprint $table) {
                $table->foreign('semester_id')->references('id')->on('semesters')
                            ->onDelete('restrict')
                            ->onUpdate('restrict');
            });
         Schema::table('results', function(Blueprint $table) {
                $table->foreign('dept_id')->references('id')->on('depts')
                            ->onDelete('restrict')
                            ->onUpdate('restrict');
            });

         Schema::table('subjects', function(Blueprint $table) {
                $table->foreign('dept_id')->references('id')->on('depts')
                            ->onDelete('restrict')
                            ->onUpdate('restrict');
            });
         Schema::table('subjects', function(Blueprint $table) {
                $table->foreign('semester_id')->references('id')->on('semesters')
                            ->onDelete('restrict')
                            ->onUpdate('restrict');
            });
         Schema::table('gpas', function(Blueprint $table) {
                $table->foreign('user_id')->references('id')->on('users')
                            ->onDelete('restrict')
                            ->onUpdate('restrict');
            });
         Schema::table('gpas', function(Blueprint $table) {
                $table->foreign('semester_id')->references('id')->on('semesters')
                            ->onDelete('restrict')
                            ->onUpdate('restrict');
            });
    }

    public function down()
    {
        
        Schema::table('users', function(Blueprint $table) {
            $table->dropForeign('users_dept_id_foreign');
        });
 
        Schema::table('users', function(Blueprint $table) {
            $table->dropForeign('users_grade_id_foreign');
        });

        Schema::table('users', function(Blueprint $table) {
            $table->dropForeign('users_semester_id_foreign');
        });

        Schema::table('semesters', function(Blueprint $table) {
            $table->dropForeign('semesters_grade_id_foreign');
        });

        Schema::table('results', function(Blueprint $table) {
            $table->dropForeign('results_user_id_foreign');
        });

        Schema::table('results', function(Blueprint $table) {
            $table->dropForeign('results_year_id_foreign');
        });

        Schema::table('results', function(Blueprint $table) {
            $table->dropForeign('results_subject_id_foreign');
        });

        Schema::table('results', function(Blueprint $table) {
            $table->dropForeign('results_grade_id_foreign');
        });

        Schema::table('subjects', function(Blueprint $table) {
            $table->dropForeign('subjects_dept_id_foreign');
        });

        Schema::table('subjects', function(Blueprint $table) {
            $table->dropForeign('subjects_semester_id_foreign');
        });

        Schema::table('gpas', function(Blueprint $table) {
            $table->dropForeign('gpas_user_id_foreign');
        });
    }

}
