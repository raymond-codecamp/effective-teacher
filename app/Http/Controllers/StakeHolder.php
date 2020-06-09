<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StakeHolder extends Controller
{
   public function loadDashBoard($key,Request $request)
   {
   		if($request->session()->has('userinfo'))
   		{
   			$info = $request->session()->get('userinfo');
   			$usertype= $info['type'];
            $username = $info['username'];
            $key_session= $info['key'];
            if($key == $key_session)
            {
               $user ="";
               if($usertype == 2)
               {
                  $user = "Controller";
                  return view('dashboard')->with(['username'=>$username,'user'=>$user,'key'=>$key]);
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
   			$request->session()->flush();
   			return redirect('Login')->with('alert','No login information found, Kindly login again!');
   		}
   		
   }
}
