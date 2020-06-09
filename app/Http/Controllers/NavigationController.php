<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Hash;


class NavigationController extends Controller
{
    public function loadAbout()
    {
    	return view('about');
    }
    public function loadManagePrograms($key, Request $request)
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
               $user ="";
               if($usertype == 2)
               {
                  $user = "Controller";
                  
                  $history = DB::table('tbl_programhistory')->join('tbl_programtype','tbl_programhistory.ProgramTypeId','=','tbl_programtype.ProgramTypeId')->where('ProgramHistoryStatus','=',1)->paginate(1); 
                  $programs = DB::table('tbl_program')->where('ProgramStatus','=',1)->paginate(2);
                  $departments = DB::table('tbl_department')->where('DepartmentStatus','=',1)->paginate(3);
                  return view('ManagePrograms')->with(['username'=>$username,'user'=>$user,'key_validate'=>$key,'dept'=>$collection,'programs'=>$programs,'departments'=>$departments,'history'=>$history]);
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
