<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Hash;

class ProgramManagementController extends Controller
{
    public function requestSaveDepartment(Request $request)
    {
    	$validated = $request->validate([
    		'departmentname' =>'required|regex:/^[a-z\d\-_\s]+$/',
    		'password' => 'required'
    	]);
    	$info = $request->session()->get('userinfo');
    	$username = $info['username'];
    	$key = $info['key'];
    	$collection = DB::table('tbl_users')->select('UserPassword','UserTypeId')->where('username','=',$username)->get();
            $salt="";
            $type="";
            foreach ($collection as $item) {
                $salt = $item->UserPassword;
                $type = $item->UserTypeId;
            }
            $password = $validated['password'];
            if($type == 2)
            {
            	 if (Hash::check($password, $salt)) {
	                DB::table('tbl_department')->insert(['DepartmentId' =>0, 'departmentname' => $validated['departmentname'], 'DepartmentStatus' =>true]);
	                $url = '/ManagePrograms/'.$key;
	                return redirect($url)->with('alert','Department saved successfully!');
	            }
	            else
	            {
	            	$url = '/ManagePrograms/'.$key;
	            	return redirect($url)->withErrors(['Message'=>'Password not matched!']);
	            }
            }
            else
            {
            	return redirect('Logout');
            }
    }
    public function requestSaveProgram(Request $request)
    {
    	$validated = $request->validate([
    		'dept' =>'required',
    		'programname' =>'required|regex:/^[\w\-\s]+$/|unique:tbl_program',
    		'programdescription' =>'required',
    		'image' =>'image',
    		'password' => 'required'
    	]);
    	$info = $request->session()->get('userinfo');
    	$username = $info['username'];
    	$key = $info['key'];
    	$collection = DB::table('tbl_users')->select('UserPassword','UserTypeId')->where('username','=',$username)->get();
            $salt="";
            $type="";
            foreach ($collection as $item) {
                $salt = $item->UserPassword;
                $type = $item->UserTypeId;
            }
            $files=$request->file('image');
            $password = $validated['password'];
            if($type == 2)
            {
            	 if (Hash::check($password, $salt)) {
            	 	$path = "";
            	 	if($files)
            	 	{
            	 		$file = $validated['image'];
	            	 	$ext = $file->getClientOriginalExtension();
	            	 	$filename = $validated['programname'].'.'.$ext;
	            	 	$path = $file->move('program_images',$filename);	
            	 	}
            	 	else
            	 	{
            	 		$path = "program_images/default.jpg";
            	 	}
            	 	$fromdate=$request->input('programfromdate');
            	 	$todate=$request->input('programtodate');
            	 	$insert="";
            	 	if($fromdate && $todate)
            	 	{
            	 		$insert = ['ProgramId' =>0, 'programname' => $validated['programname'],'ProgramDescription' => $validated['programdescription'],'ProgramFromDate' => $validated['programfromdate'],'ProgramToDate' => $validated['programtodate'],'ProgramImage' => $path, 'DepartmentId' =>$validated['dept'],'ProgramStatus'=>true];
            	 	}
            	 	else
            	 	{
            	 		$insert =['ProgramId' =>0, 'programname' => $validated['programname'],'ProgramDescription' => $validated['programdescription'],'ProgramImage' => $path, 'DepartmentId' =>$validated['dept'],'ProgramStatus'=>true];
            	 	}
	                DB::table('tbl_program')->insert($insert);
	                $url = '/ManagePrograms/'.$key;
	                return redirect($url)->with('alert','Program saved successfully!');
	            }
	            else
	            {
	            	$url = '/ManagePrograms/'.$key;
	            	return redirect($url)->withErrors(['Message'=>'Password not matched!']);
	            }
            }
            else
            {
            	return redirect('Logout');
            }

    }
	public function requestEditProgram(Request $request)
    {
    	$validated = $request->validate([
    		'programname' =>'regex:/^[\w\-\s]+$/',
    		'image' =>'image',
    		'password' => 'required'
    	]);
    	$info = $request->session()->get('userinfo');
    	$username = $info['username'];
    	$key = $info['key'];
    	$collection = DB::table('tbl_users')->select('UserPassword','UserTypeId')->where('username','=',$username)->get();
            $salt="";
            $type="";
            foreach ($collection as $item) {
                $salt = $item->UserPassword;
                $type = $item->UserTypeId;
            }
            $files=$request->file('image');
            $password = $validated['password'];
            if($type == 2)
            {
            	 if (Hash::check($password, $salt)) {
            	 	$path = "";
            	 	$fromdate=$request->input('programfromdate');
            	 	$todate=$request->input('programtodate');
            	 	$update="";
            	 	$des = trim($request->input('programdescription_edit'));
            	 	$program_name = $request->input('programname');
            	 	$program_id = $request->input('programid');
            	 	if($des!="")
            	 	{
	            	 	if($files)
	            	 	{
	            	 		$file = $validated['image'];
		            	 	$ext = $file->getClientOriginalExtension();
		            	 	$filename = $program_name.'.'.$ext;
		            	 	$path = $file->move('program_images',$filename);
		            	 	if($fromdate && $todate)
		            	 	{
		            	 		$update = ['ProgramDescription' => $des,'ProgramFromDate' => $fromdate,'ProgramToDate' => $todate,'ProgramImage' => $path];
		            	 	}
		            	 	else
		            	 	{
		            	 		$update =['ProgramDescription' => $des,'ProgramImage' => $path];
		            	 	}	
	            	 	}
	            	 	else
	            	 	{
	            	 		if($fromdate && $todate)
		            	 	{
		            	 		$update = ['ProgramDescription' => $des,'ProgramFromDate' => $fromdate,'ProgramToDate' => $todate];
		            	 	}
		            	 	else
		            	 	{
		            	 		$update =['ProgramDescription' => $des];
		            	 	}	
	            	 	}
            	 	}
            	 	else
            	 	{
		            	if($files)
	            	 	{
	            	 		$file = $validated['image'];
		            	 	$ext = $file->getClientOriginalExtension();
		            	 	$filename = $validated['programname'].'.'.$ext;
		            	 	$path = $file->move('program_images',$filename);
		            	 	if($fromdate && $todate)
		            	 	{
		            	 		$update = ['ProgramFromDate' => $fromdate,'ProgramToDate' => $todate,'ProgramImage' => $path];
		            	 	}
		            	 	else
		            	 	{
		            	 		$update =['ProgramImage' => $path];
		            	 	}	
	            	 	}
	            	 	else
	            	 	{
	            	 		if($fromdate && $todate)
		            	 	{
		            	 		$update = ['ProgramFromDate' => $fromdate,'ProgramToDate' => $todate];
		            	 	}
		            	 	else
		            	 	{
		            	 		$update ="";
		            	 	}	
	            	 	}            	 		
            	 	}

            	 	
            	 	if($update!="")
            	 	{
            	 		DB::table('tbl_program')->where('ProgramId','=',$program_id)->update($update);
	                	$url = '/ManagePrograms/'.$key;
	                	return redirect($url)->with('alert',$program_name.' Edited successfully!');
            	 	}
            	 	else
            	 	{
            	 		$url = '/ManagePrograms/'.$key;
	                	return redirect($url)->withErrors('nochange','No information provided to update!');
            	 	}
	                
	            }
	            else
	            {
	            	$url = '/ManagePrograms/'.$key;
	            	return redirect($url)->withErrors(['Message'=>'Password not matched!']);
	            }
            }
            else
            {
            	return redirect('Logout');
            }

    }
    public function requestDeletePrograms(Request $request)
    {
    	$validated = $request->validate([
    		'password' => 'required'
    	]);
    	$info = $request->session()->get('userinfo');
    	$username = $info['username'];
    	$key = $info['key'];
    	$collection = DB::table('tbl_users')->select('UserPassword','UserTypeId')->where('username','=',$username)->get();
            $salt="";
            $type="";
            foreach ($collection as $item) {
                $salt = $item->UserPassword;
                $type = $item->UserTypeId;
            }
            $files=$request->file('image');
            $password = $validated['password'];
            if($type == 2)
            {
            	 if (Hash::check($password, $salt)) {
            	 	$program_id = $request->input('programid');
            	 	$program_name = $request->input('programname');
            	 	DB::table('tbl_program')->where('ProgramId','=',$program_id)->update(['ProgramStatus' => 0]);
	                $url = '/ManagePrograms/'.$key;
	                return redirect($url)->with('alert',strtoupper($program_name).' Deleted successfully!');
            	 }
            	  else
	            {
	            	$url = '/ManagePrograms/'.$key;
	            	return redirect($url)->withErrors(['Message'=>'Password not matched!']);
	            }
            }
            else
            {
            	return redirect('Logout');
            }
    }
	public function requestEditDepartment(Request $request)
    {
    	$validated = $request->validate([
    		'departmentname' =>'required|unique:tbl_department',
    		'password' => 'required'
    	]);
    	$info = $request->session()->get('userinfo');
    	$username = $info['username'];
    	$key = $info['key'];
    	$collection = DB::table('tbl_users')->select('UserPassword','UserTypeId')->where('username','=',$username)->get();
            $salt="";
            $type="";
            foreach ($collection as $item) {
                $salt = $item->UserPassword;
                $type = $item->UserTypeId;
            }
            $files=$request->file('image');
            $password = $validated['password'];
            if($type == 2)
            {
            	 if (Hash::check($password, $salt)) {
            	 	$departmentname=$validated['departmentname'];
            	 	echo $departmentname;
            	 	$department_id = $request->input('departmentid');
            	 	echo $department_id;
            	 	DB::table('tbl_department')->where('DepartmentId','=',$department_id)->update(['departmentname'=>$departmentname]);
	                $url = '/ManagePrograms/'.$key;
	                return redirect($url)->with('alert',strtoupper($departmentname).' Edited successfully!');     
	            }
	            else
	            {
	            	$url = '/ManagePrograms/'.$key;
	            	return redirect($url)->withErrors(['Message'=>'Password not matched!']);
	            }
            }
            else
            {
            	return redirect('Logout');
            }

    }
    public function requestDeleteDepartment(Request $request)
    {
    	$validated = $request->validate([
    		'password' => 'required'
    	]);
    	$info = $request->session()->get('userinfo');
    	$username = $info['username'];
    	$key = $info['key'];
    	$collection = DB::table('tbl_users')->select('UserPassword','UserTypeId')->where('username','=',$username)->get();
            $salt="";
            $type="";
            foreach ($collection as $item) {
                $salt = $item->UserPassword;
                $type = $item->UserTypeId;
            }
            $files=$request->file('image');
            $password = $validated['password'];
            if($type == 2)
            {
            	 if (Hash::check($password, $salt)) {
            	 	$department_id = $request->input('departmentid');
            	 	$department_name = $request->input('departmentname');
            	 	DB::table('tbl_department')->where('DepartmentId','=',$department_id)->update(['DepartmentStatus' => 0]);
	                $url = '/ManagePrograms/'.$key;
	                return redirect($url)->with('alert',strtoupper($department_name).' Deleted!');
            	 }
            	  else
	            {
	            	$url = '/ManagePrograms/'.$key;
	            	return redirect($url)->withErrors(['Message'=>'Password not matched!']);
	            }
            }
            else
            {
            	return redirect('Logout');
            }
    }
}
