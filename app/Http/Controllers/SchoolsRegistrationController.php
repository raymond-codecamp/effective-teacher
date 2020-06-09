<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Mail;

class SchoolsRegistrationController extends Controller
{
    public function requestSaveSchool(Request $request)
    {
        $date = date("Y");
        $validated = $request->validate([
            'SchoolName' =>'required',
            'SchoolAddress' => 'required',
            'SchoolType' => 'required',
            'SchoolManagementType' => 'required',
            'ClassFrom' => 'required|numeric|min:1|max:11',
            'ClassTo' => 'required|numeric|min:4|max:12',
            'SchoolLevel' => 'required',
            'SchoolYOE' => 'required|numeric|max:'.$date,
            'SchoolStrength' => 'required|numeric',
            'District' => 'required',
            'SchoolEduDistrict' => 'required',
            'SchoolEduSubDistrict' => 'required',
            'Achivements' => '',
            'Name' => 'required',
            'Designation' => 'required',
            'Address' => 'required',
            'Email' => 'required|email',
            'Mobile' => 'required|numeric',
            'SchoolEmail' => 'required|email',
            'HeadTeacherName' => 'required',
            'HeadTeacherPhone' => 'required|numeric',
            'program' => '',
        ]);
        $schoolname = $validated["SchoolName"];
        $schooladdress = $validated["SchoolAddress"];
        $schooltype = $validated["SchoolType"];
        $schoolmanagementtype = $validated["SchoolManagementType"];
        $classfrom = $validated["ClassFrom"];
        $classto = $validated["ClassTo"];
        $schoollevel = $validated["SchoolLevel"];
        $schoolyoe = $validated["SchoolYOE"];
        $schoolstrength = $validated["SchoolStrength"];
        $district = $validated["District"];
        $schooledudist = $validated["SchoolEduDistrict"];
        $schooledusbdist = $validated["SchoolEduSubDistrict"];
        $achivements = $validated["Achivements"];
        $name = $validated["Name"];
        $designation = $validated["Designation"];
        $address = $validated["Address"];
        $email = $validated["Email"];
        $mobile = $validated["Mobile"];
        $schoolemail = $validated["SchoolEmail"];
        $headteachername = $validated["HeadTeacherName"];
        $headteacherphone =$validated["HeadTeacherPhone"];
        $program = $validated["program"];
        $programs = DB::table('tbl_program')->where('ProgramId','=',$program)->get();
        $programName = "";
        $date = date('Y-m-d');
        foreach ($programs as $key => $value) {
            $programName = $value->programname;
        }
        $id = DB::table('tbl_school')->insertGetId(['SchoolName'=>$schoolname,'SchoolAddress'=>$schooladdress,'SchoolTypeId'=>$schooltype,'SchoolManagementTypeId'=>$schoolmanagementtype,'SchoolClassesFrom'=>$classfrom,'SchoolClassesTo'=>$classto,'SchoolLevel'=>$schoollevel,'SchoolYOE'=>$schoolyoe,'SchoolTotalStrength'=>$schoolstrength,'DistrictId'=>$district,'SchoolEduDistrict'=>$schooledudist,'SchoolEduSubDistrict'=>$schooledusbdist,'SchoolAchivements'=>$achivements, 'SchoolEmail'=>$schoolemail,'SchoolAddDate'=>date('Y-m-d'),'SchoolStatus'=> true]);
        DB::table('tbl_coordinators')->insert(['CoordinatorId'=> 0,'SchoolId'=>$id,'CoordinatorName'=>$name,'CoordinatorDesignation'=>$designation,'CoordinatorAddress'=>$address,'CoordinatorEmail'=>$email,'CoordinatorPhone'=>$mobile,'CoordinatorStatus'=>true]);
        DB::table('tbl_headteacher')->insert(['HeadTeacherId'=> 0,'SchoolId'=>$id,'HeadTeacherName'=>$headteachername,'HeadTeacherPhone'=>$headteacherphone,'HeadTeacherStatus'=>true]);
        DB::table('tbl_registration')->insert(['RegistrationId'=> 0,'SchoolId'=>$id,'ProgramId'=>$program,'RegistrationDate'=>$date,'RegistrationStatus'=>true]);
        $email = $validated["Email"];
        $heading = 'Registration Successfull';
        $greeting = 'Dear '.$name;
        $body = ' Your registration for '.$programName.' has been submitted for the review, you will be notified when your registration is confirmed. Thankyou, for registering with EFFECTIVE TEACHER.';
        $data = ['heading'=>$heading,'greeting'=>$greeting,'body'=>$body];
        $sendInfo = array('email' => $email,'head' => 'Registration Successful');
	    Mail::send('mail', $data, function($message) use ($sendInfo) {
	         $message->to($sendInfo["email"], $sendInfo["head"])->subject
	            ('EFFECTIVE TEACHER School Registration Successfull!');
	         $message->from('notification.effectiveteacher@gmail.com','Effective Teacher');
	      });
        $greeting = 'Dear Coordinator,';
        $data = ['heading'=>$heading,'greeting'=>$greeting,'body'=>$body];
        $sendInfo = array('email' => $schoolemail,'head' => 'Registration Successful');
        Mail::send('mail', $data, function($message) use ($sendInfo) {
             $message->to($sendInfo["email"], $sendInfo["head"])->subject
                ('EFFECTIVE TEACHER School Registration Successfull!');
             $message->from('notification.effectiveteacher@gmail.com','Effective Teacher');
          });
	      return redirect('/Programs')->with('message',"HTML Email Sent. Check your inbox.");
    }
}
