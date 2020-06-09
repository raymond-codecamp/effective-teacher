<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProgramTypeAndHistoryMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('tbl_programtype', function (Blueprint $table) {
            $table->increments('ProgramTypeId');
            $table->string('ProgramTypeName');
            $table->boolean('ProgramTypeStatus');
        });
        Schema::create('tbl_programhistory', function (Blueprint $table) {
            $table->increments('ProgramHistoryId');
            $table->string('ProgramHistoryName');
            $table->string('ProgramHistoryDescription');
            $table->string('ProgramHistoryPlace');
            $table->string('ProgramHistoryImage');
            $table->unsignedInteger('ProgramTypeId');
            $table->foreign('ProgramTypeId')->references('ProgramTypeId')->on('tbl_programtype');
            $table->boolean('ProgramHistoryStatus');
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
