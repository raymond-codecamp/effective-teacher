<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Sprint2Phase1Migration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_department', function (Blueprint $table) {
            $table->increments('DepartmentId');
            $table->string('DepartmenteName');
            $table->boolean('DepartmentStatus');
        });
        Schema::create('tbl_program', function (Blueprint $table) {
            $table->increments('ProgramId');
            $table->string('ProgramName');
            $table->date('ProgramFromDate');
            $table->date('ProgramToDate');
            $table->unsignedInteger('DepartmentId');
            $table->foreign('DepartmentId')->references('DepartmentId')->on('tbl_department');
            $table->boolean('ProgramStatus');
        });
        Schema::create('tbl_programindex', function (Blueprint $table) {
            $table->increments('ProgramIndexId');
            $table->unsignedInteger('ProgramId');
            $table->foreign('ProgramId')->references('ProgramId')->on('tbl_program');
            $table->integer('ProgramIndex');
            $table->boolean('ProgramIndexStatus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
