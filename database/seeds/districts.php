<?php

use Illuminate\Database\Seeder;

class districts extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {      
        DB::table('tbl_district')->insert([
            'DistrictId' => 0,
            'DistrictName' => 'Kasaragod',
            'DistrictStatus' => 1,
        ]);
        DB::table('tbl_district')->insert([
            'DistrictId' => 0,
            'DistrictName' => 'Kannur',
            'DistrictStatus' => 1,
        ]);
        DB::table('tbl_district')->insert([
            'DistrictId' => 0,
            'DistrictName' => 'Wayanad',
            'DistrictStatus' => 1,
        ]);  
        DB::table('tbl_district')->insert([
            'DistrictId' => 0,
            'DistrictName' => 'Kozhikode',
            'DistrictStatus' => 1,
        ]);
        DB::table('tbl_district')->insert([
            'DistrictId' => 0,
            'DistrictName' => 'Palakkad',
            'DistrictStatus' => 1,
        ]);
        DB::table('tbl_district')->insert([
            'DistrictId' => 0,
            'DistrictName' => 'Malappuram',
            'DistrictStatus' => 1,
        ]);
        DB::table('tbl_district')->insert([
            'DistrictId' => 0,
            'DistrictName' => 'Thrissur',
            'DistrictStatus' => 1,
        ]);
        DB::table('tbl_district')->insert([
            'DistrictId' => 0,
            'DistrictName' => 'Ernakulam',
            'DistrictStatus' => 1,
        ]);
        DB::table('tbl_district')->insert([
            'DistrictId' => 0,
            'DistrictName' => 'Idukki',
            'DistrictStatus' => 1,
        ]);
        DB::table('tbl_district')->insert([
            'DistrictId' => 0,
            'DistrictName' => 'Kottayam',
            'DistrictStatus' => 1,
        ]);
        DB::table('tbl_district')->insert([
            'DistrictId' => 0,
            'DistrictName' => 'Alappuzha',
            'DistrictStatus' => 1,
        ]);
        DB::table('tbl_district')->insert([
            'DistrictId' => 0,
            'DistrictName' => 'Pathanamthitta',
            'DistrictStatus' => 1,
        ]);
        DB::table('tbl_district')->insert([
            'DistrictId' => 0,
            'DistrictName' => 'Kollam',
            'DistrictStatus' => 1,
        ]);
        DB::table('tbl_district')->insert([
            'DistrictId' => 0,
            'DistrictName' => 'Thiruvananthapuram',
            'DistrictStatus' => 1,
        ]);
        DB::table('tbl_SchoolType')->insert([
            'SchoolTypeId' => 0,
            'SchoolTypeName' => 'Mixed',
            'SchoolTypeStatus' => 1,
        ]);
        DB::table('tbl_SchoolType')->insert([
            'SchoolTypeId' => 0,
            'SchoolTypeName' => 'Boys',
            'SchoolTypeStatus' => 1,
        ]);
        DB::table('tbl_SchoolType')->insert([
            'SchoolTypeId' => 0,
            'SchoolTypeName' => 'Girls',
            'SchoolTypeStatus' => 1,
        ]);
        DB::table('tbl_SchoolManagementType')->insert([
            'SchoolManagementTypeId' => 0,
            'SchoolManagementTypeName' => 'Government',
            'SchoolManagementTypeStatus' => 1,
        ]);
        DB::table('tbl_SchoolManagementType')->insert([
            'SchoolManagementTypeId' => 0,
            'SchoolManagementTypeName' => 'Aided',
            'SchoolManagementTypeStatus' => 1,
        ]);
        DB::table('tbl_SchoolManagementType')->insert([
            'SchoolManagementTypeId' => 0,
            'SchoolManagementTypeName' => 'Un-Aided',
            'SchoolManagementTypeStatus' => 1,
        ]);
    }
}
