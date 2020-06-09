<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB; 
use Hash;

class Login extends Controller
{
    function getId( $valLength ) {
        $result = '';
        $moduleLength = 40;   // we use sha1, so module is 40 chars
        $steps = round(($valLength/$moduleLength) + 0.5);

        for( $i=0; $i<$steps; $i++ ) {
          $result .= sha1( uniqid() . md5( rand() . uniqid() ) );
        }

        return substr( $result, 0, $valLength );
    }
    public function loadLogin(){
        return view('login');
    }
    public function requestLogin(Request $request){
    	
    	$validated = Validator::make($request->all(),[
            'Username' => 'required|exists:tbl_users|alpha_num',
            'Password' => 'required',
            'login'    => 'required',
            'captcha'  => 'required'
        ],[
            'required' => ':attribute.Empty :attribute Field',
            'exists'   => ':attribute.No such username exists',
            'alpha_num' => ':attribute.Only Alphabets and Numbers'
        ]);
         if ($validated->fails()) {
            return redirect()->back()->withErrors($validated)->withInput($request->all());
        }
        $token = $request->input('captcha');
        $url = "https://www.google.com/recaptcha/api/siteverify";
        $data = [
            'secret' => '6Ld10qEUAAAAAOXmjcq0qIbBuvi6ns0TQk6DxmZ6',
            'response' => $token,
            'remoteip' => $_SERVER['REMOTE_ADDR']
        ];
        $options = array(
            'http' => array(
              'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
              'method'  => 'POST',
              'content' => http_build_query($data)
            )
          );
        $context  = stream_context_create($options);
        $response = file_get_contents($url, false, $context);
        $res = json_decode($response, true);
        if($res['success'] == true) {
            $username = $request->input('Username');
            $collection = DB::table('tbl_users')->select('UserPassword','UserTypeId')->where('username','=',$username)->get();
            $salt="";
            $type="";
            foreach ($collection as $item) {
                $salt = $item->UserPassword;
                $type = $item->UserTypeId;
            }
            $password = $request->input('Password');
            if (Hash::check($password, $salt)) {
                $rand = $this->getId(256);
                $info = ['username' => $username,'type' => $type, 'key' =>$rand];
                $request->session()->put('userinfo',$info);
                $url = url('/DashBoard/'.$rand);
                return redirect($url);
            }
            else
            {
                return redirect('Login')->withErrors(['password',"password.Password isn't seem to be right!"])->withInput($request->all());
            }
        } else {
            return redirect('Login')->with('alert','Humen varification failed!');
        }
    }
    public function logoutRequest(Request $request)
    {
        $request->session()->forget('userinfo');
        $request->session()->flush();
        return redirect('/');
    }
}
