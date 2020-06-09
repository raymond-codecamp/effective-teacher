<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NeAdditionsOn5262019 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_schoollevel', function (Blueprint $table) {
            $table->increments('SchoolLevelId');
            $table->string('SchoolLevelName');
            $table->boolean('SchoolLevelStatus');
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
