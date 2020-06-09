<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Sprint1Phase1Tables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_usertype', function (Blueprint $table) {
            $table->increments('UserTypeId');
            $table->string('UserTypeName');
            $table->boolean('UserTypeStatus');
        });
        Schema::create('tbl_users', function (Blueprint $table) {
            $table->increments('UserId');
            $table->string('UserName');
            $table->string('UserPassword');
            $table->unsignedInteger('UserTypeId');
            $table->foreign('UserTypeId')->references('UserTypeId')->on('tbl_usertype');
            $table->boolean('UserStatus');
        });
        Schema::create('tbl_login', function (Blueprint $table) {
            $table->increments('LoginId');
            $table->unsignedInteger('UserId');
            $table->foreign('UserId')->references('UserId')->on('tbl_users');
            $table->dateTimeTz('LoginTime')->nullable($value = true);
            $table->ipAddress('LoginIP');
            $table->boolean('LoginStatus');
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
