<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class sprint1_phase1_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id = DB::table('tbl_UserType')->insertGetId([
            'UserTypeId' => 0,
            'UserTypeName' => 'Stakeholder',
            'UserTypeStatus' => 1,
        ]);
        $hashed = Hash::make('password');
        DB::table('tbl_Users')->insert([
            'UserId' => 0,
            'UserName' => '201904052257',
            'UserPassword' => $hashed,
            'UserTypeId' => $id,
            'UserStatus' => 1,
        ]);
    }
}
