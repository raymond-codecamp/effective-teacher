<?php

use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_schoollevel')->insert([
            'SchoolLevelId' => 0,
            'SchoolLevelName' => 'LP School',
            'SchoolLevelStatus' => 1,
        ]);
        DB::table('tbl_schoollevel')->insert([
            'SchoolLevelId' => 0,
            'SchoolLevelName' => 'UP School',
            'SchoolLevelStatus' => 1,
        ]);
        DB::table('tbl_schoollevel')->insert([
            'SchoolLevelId' => 0,
            'SchoolLevelName' => 'High School',
            'SchoolLevelStatus' => 1,
        ]);
        DB::table('tbl_schoollevel')->insert([
            'SchoolLevelId' => 0,
            'SchoolLevelName' => 'LP School + UP School',
            'SchoolLevelStatus' => 1,
        ]);
        DB::table('tbl_schoollevel')->insert([
            'SchoolLevelId' => 0,
            'SchoolLevelName' => 'UP School + High School',
            'SchoolLevelStatus' => 1,
        ]);
        DB::table('tbl_schoollevel')->insert([
            'SchoolLevelId' => 0,
            'SchoolLevelName' => 'LP School + High School',
            'SchoolLevelStatus' => 1,
        ]);
        DB::table('tbl_schoollevel')->insert([
            'SchoolLevelId' => 0,
            'SchoolLevelName' => 'LP School + UP School + High School',
            'SchoolLevelStatus' => 1,
        ]);
    }
}
