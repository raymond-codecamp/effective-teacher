<?php

use Illuminate\Database\Seeder;

class ProgramTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_programtype')->insert([
            'ProgramTypeId' => 0,
            'ProgramTypeName' => 'Seminar',
            'ProgramTypeStatus' => 1,
        ]);
        DB::table('tbl_programtype')->insert([
            'ProgramTypeId' => 0,
            'ProgramTypeName' => 'Workshop',
            'ProgramTypeStatus' => 1,
        ]);
        DB::table('tbl_programtype')->insert([
            'ProgramTypeId' => 0,
            'ProgramTypeName' => 'Camp',
            'ProgramTypeStatus' => 1,
        ]);
        DB::table('tbl_programtype')->insert([
            'ProgramTypeId' => 0,
            'ProgramTypeName' => 'Quiz Competetion',
            'ProgramTypeStatus' => 1,
        ]);
        DB::table('tbl_programtype')->insert([
            'ProgramTypeId' => 0,
            'ProgramTypeName' => 'Competitive Exam',
            'ProgramTypeStatus' => 1,
        ]);
        DB::table('tbl_programtype')->insert([
            'ProgramTypeId' => 0,
            'ProgramTypeName' => 'Project Exibition',
            'ProgramTypeStatus' => 1,
        ]);
        DB::table('tbl_programtype')->insert([
            'ProgramTypeId' => 0,
            'ProgramTypeName' => 'Project Competition',
            'ProgramTypeStatus' => 1,
        ]);

    }
}
