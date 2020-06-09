<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Hash;
use Crypt;

class RegistrationController extends Controller
{
    public function loadRegistration($id, $level)
    {
    	$id = Crypt::decrypt($id);
    	$level = Crypt::decrypt($level);
    	$collection = DB::table('tbl_program')->where([['ProgramStatus','=',1],['ProgramId','=',$id]])->get();
    	$name="";
    	foreach ($collection as $key => $value) {
    		$name = $value->programname;
    	}
    	$schooltypes = DB::table('tbl_schooltype')->where('SchoolTypeStatus','=',1)->get();
    	$schoolmanagemnttypes = DB::table('tbl_schoolmanagementtype')->where('SchoolManagementTypeStatus','=',1)->get();
        $schoollevel = DB::table('tbl_schoollevel')->where('SchoolLevelStatus','=',1)->get();
    	$district = DB::table('tbl_district')->where('DistrictStatus','=',1)->get();
    	return view('registration')->with(['name'=>$name,'schooltypes'=>$schooltypes,'schoolmanagementtypes'=>$schoolmanagemnttypes,'district'=>$district,'program'=>$id,'schoollevel'=> $schoollevel]);
    }
    public function loadProgramRegistration()
    {
        $all = DB::table('tbl_department')->join('tbl_program','tbl_department.DepartmentId','=','tbl_program.DepartmentId')->select('ProgramId','programname','ProgramImage','departmentname','ProgramDescription')->where([['ProgramStatus','=',1],['DepartmentStatus','=',1]])->paginate(2);
        $departments=DB::table('tbl_department')->select('DepartmentId','departmentname')->where('DepartmentStatus','=',1)->get();
        return view('registerProgram')->with(['all'=>$all,'departments'=>$departments]);
    }
}
