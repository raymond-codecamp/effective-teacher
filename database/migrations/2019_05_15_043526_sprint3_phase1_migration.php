<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Sprint3Phase1Migration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_schooltype', function (Blueprint $table) {
            $table->increments('SchoolTypeId');
            $table->string('SchoolTypeName');
            $table->boolean('SchoolTypeStatus');
        });
        Schema::create('tbl_schoolmanagementtype', function (Blueprint $table) {
            $table->increments('SchoolManagementTypeId');
            $table->string('SchoolManagementTypeName');
            $table->boolean('SchoolManagementTypeStatus');
        });
        Schema::create('tbl_district', function (Blueprint $table) {
            $table->increments('DistrictId');
            $table->string('DistrictName');
            $table->boolean('DistrictStatus');
        });
        Schema::create('tbl_school', function (Blueprint $table) {
            $table->increments('SchoolId');
            $table->string('SchoolName');
            $table->string('SchoolAddress');
            $table->string('SchoolAchivements');
            $table->integer('SchoolClassesFrom');
            $table->integer('SchoolClassesTo');
            $table->string('SchoolEduDistrict');
            $table->string('SchoolEduSubDistrict');
            $table->integer('SchoolTotalStrength');
            $table->unsignedInteger('DistrictId');
            $table->foreign('DistrictId')->references('DistrictId')->on('tbl_district');
            $table->unsignedInteger('SchoolManagementTypeId');
            $table->foreign('SchoolManagementTypeId')->references('SchoolManagementTypeId')->on('tbl_schoolmanagementtype');
            $table->unsignedInteger('SchoolTypeId');
            $table->foreign('SchoolTypeId')->references('SchoolTypeId')->on('tbl_schooltype');
            $table->boolean('ProgramStatus');
        });
        Schema::create('tbl_coordinators', function (Blueprint $table) {
            $table->increments('CoordinatorId');
            $table->string('CoordinatorName');
            $table->unsignedInteger('SchoolId');
            $table->foreign('SchoolId')->references('SchoolId')->on('tbl_school');
            $table->string('CoordinatorEmail');
            $table->string('CoordinatorPhone');
            $table->boolean('CoordinatorStatus');
        });
        Schema::create('tbl_headteacher', function (Blueprint $table) {
            $table->increments('HeadTeacherId');
            $table->string('HeadTeacherName');
            $table->unsignedInteger('SchoolId');
            $table->foreign('SchoolId')->references('SchoolId')->on('tbl_school');
            $table->string('HeadTeacherPhone');
            $table->boolean('HeadTeacherStatus');
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
