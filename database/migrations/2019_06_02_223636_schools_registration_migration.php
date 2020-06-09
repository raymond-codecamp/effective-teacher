<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SchoolsRegistrationMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_registration', function (Blueprint $table) {
            $table->increments('RegistrationId');
            $table->unsignedInteger('SchoolId');
            $table->foreign('SchoolId')->references('SchoolId')->on('tbl_school');
            $table->unsignedInteger('ProgramId');
            $table->foreign('ProgramId')->references('ProgramId')->on('tbl_program');
            $table->date('RegistrationDate');
            $table->boolean('RegistrationStatus');
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
