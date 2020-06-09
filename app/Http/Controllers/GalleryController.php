<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Hash;

class GalleryController extends Controller
{
    public function loadManageGallery($key, Request $request)
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
                  $programType = DB::table('tbl_programtype')->select('ProgramTypeId','ProgramTypeName')->where('ProgramTypeStatus','=',1)->get();
                  $programHistory = DB::table('tbl_programhistory')->join('tbl_programtype','tbl_programhistory.ProgramTypeId','=','tbl_programtype.ProgramTypeId')->where('ProgramHistoryStatus','=',1)->paginate(2);
                  if(count($programHistory) == 0)
                  {
                    $programHistory = "empty";
                  }
                  return view('addgallery')->with(['programType'=>$programType,'programHistory'=>$programHistory,'user'=>$user,'key_validate'=>$key]);
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
    public function requestSaveProgramHistory(Request $request)
    {
      $validated = $request->validate([
        'program_history_type' =>'required',
        'program_history_name' =>'required|regex:/^[A-z\d\-_\s]+$/',
        'program_history_description' =>'required',
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
                  $filename = $validated['program_history_name'].'.'.$ext;
                  $path = $file->move('program_images',$filename);  
                }
                else
                {
                  $path = "program_images/default.jpg";
                }
                $insert="";
                $insert =['ProgramHistoryId' =>0, 'program_history_name' => $validated['program_history_name'],'ProgramHistoryDescription' => $validated['program_history_description'],'ProgramHistoryImage' => $path, 'ProgramTypeId' =>$validated['program_history_type'],'ProgramHistoryStatus'=>true];
                DB::table('tbl_programhistory')->insert($insert);
                $url = '/ManageGallery/'.$key;
                return redirect($url)->with('alert','Program History saved successfully!');
          }
              else
              {
                $url = '/ManageGallery/'.$key;
                return redirect($url)->withErrors(['Message'=>'Password not matched!']);
              }
            }
            else
            {
              return redirect('Logout');
            }
  }
    public function loadGallery()
    {
      $content_type = DB::table('tbl_programtype')->where('ProgramTypeStatus','=',1)->get();
      $content = DB::table('tbl_programhistory')->join('tbl_programtype','tbl_programhistory.ProgramTypeId','=','tbl_programType.ProgramTypeId')->get();
      return view('gallery')->with(['programHistory'=>$content,'programType'=>$content_type]);
    }
}
