<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsCOntroller extends Controller
{
    public function loadSettings($key, Request $request)
    {
    	if($request->session()->has('userinfo'))
    	{
    		$info = $request->session()->get('userinfo');
   			$usertype= $info['type'];
            $username = $info['username'];
            $user= "Controller";
            $key_session= $info['key'];
            if($key == $key_session)
            {
               $user ="";
               if($usertype == 2)
               {
                    return view('settings');
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
    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
        'OldPassword' =>'required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/',
        'NewPassword' =>'required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/|confirmed',      
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
            $password = $validated['OldPassword'];
            if($type == 2)
            {
               if (Hash::check($password, $salt)) {
                $newPassword = Hash::make($validated["NewPassword"]);
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
}
