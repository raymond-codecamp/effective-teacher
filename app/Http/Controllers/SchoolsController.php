<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Hash;

class SchoolsController extends Controller
{
     public function loadManageSchools($key, Request $request)
    {
    	if($request->session()->has('userinfo'))
    	{
    		$info = $request->session()->get('userinfo');
   			$usertype= $info['type'];
            $username = $info['username'];
            $key_session= $info['key'];
            $collection = DB::table('tbl_department')->select('DepartmentId','departmentname')->where('DepartmentStatus','=',1)->get();
            if($key == $key_session)
            {
            	$user="";
               if($usertype == 2)
               {
                  $collection = DB::table('tbl_school')->join('tbl_registration','tbl_school.SchoolId','=','tbl_registration.SchoolId')->join('tbl_headteacher','tbl_school.SchoolId','=','tbl_headteacher.SchoolId')->join('tbl_coordinators','tbl_school.SchoolId','=','tbl_coordinators.SchoolId')->join('tbl_district','tbl_school.DistrictId','=','tbl_district.DistrictId')->orderBy('RegistrationDate', 'desc')->paginate(2);
                  return view('listschools')->with(['username'=>$username,'user'=>$user,'key_validate'=>$key,'registrations'=>$collection]);
               }
                else
		        {
		            $request->session()->flush();
		            return redirect('Login')->with('alert','No login information found, Kindly login again!');
		        }
            }
	        else
	        {
	            $request->session()->flush();
	            return redirect('Login')->with('alert','No login information found, Kindly login again!');
	        }
    	}
    	else
	    {
	        return redirect('Login')->with('alert','No login information found, Kindly login again!');
	    }
    		
   
    }
    public function registrationDetails($id,$key,Request $request)
    {
    	if($request->session()->has('userinfo'))
    	{
    		$info = $request->session()->get('userinfo');
   			$usertype= $info['type'];
            $username = $info['username'];
            $key_session= $info['key'];
            $collection = DB::table('tbl_department')->select('DepartmentId','departmentname')->where('DepartmentStatus','=',1)->get();
            if($key == $key_session)
            {
            	$user="";
               if($usertype == 2)
               {
               		 $collection = DB::table('tbl_school')->join('tbl_registration','tbl_school.SchoolId','=','tbl_registration.SchoolId')->join('tbl_headteacher','tbl_school.SchoolId','=','tbl_headteacher.SchoolId')->join('tbl_coordinators','tbl_school.SchoolId','=','tbl_coordinators.SchoolId')->join('tbl_district','tbl_school.DistrictId','=','tbl_district.DistrictId')->join('tbl_schooltype','tbl_school.SchoolTypeId','=','tbl_schooltype.SchoolTypeId')->join('tbl_schoolmanagementtype','tbl_school.SchoolManagementTypeId','=','tbl_schoolmanagementtype.SchoolManagementTypeId')->where('RegistrationId', '=',$id)->get();
                  return view('infoschool')->with(['username'=>$username,'user'=>$user,'key_validate'=>$key,'registration'=>$collection]);
               }
                else
		        {
		            $request->session()->flush();
		            return redirect('Login')->with('alert','No login information found, Kindly login again!');
		        }
            }
	        else
	        {
	            $request->session()->flush();
	            return redirect('Login')->with('alert','No login information found, Kindly login again!');
	        }
    	}
    	else
	    {
	        return redirect('Login')->with('alert','No login information found, Kindly login again!');
	    }

    }
}
