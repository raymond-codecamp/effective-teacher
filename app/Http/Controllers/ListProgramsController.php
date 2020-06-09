<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Hash;


class ListProgramsController extends Controller
{
    public function getProgramsList()
    {
    	$all = DB::table('tbl_department')->join('tbl_program','tbl_department.DepartmentId','=','tbl_program.DepartmentId')->select('ProgramId','programname','ProgramImage','departmentname','ProgramDescription')->where([['ProgramStatus','=',1],['DepartmentStatus','=',1]])->paginate(2);
    	$departments=DB::table('tbl_department')->select('DepartmentId','departmentname')->where('DepartmentStatus','=',1)->get();
    	return view('listprograms')->with(['all'=>$all,'departments'=>$departments]);
    }
    public  function requestAjax(Request $request)
    {
    	$name = $request->departmentName;
    	$collection = "";
    	if($name=="All")
    	{
    		$collection = DB::table('tbl_department')->join('tbl_program','tbl_department.DepartmentId','=','tbl_program.DepartmentId')->select('ProgramId','programname','ProgramImage','departmentname','ProgramDescription')->where([['ProgramStatus','=',1],['DepartmentStatus','=',1]])->paginate(1);
    	}
    	else
    	{
    		$collection=DB::table('tbl_program')->join('tbl_department','tbl_program.DepartmentId','=','tbl_department.DepartmentId')->select('ProgramId','programname','ProgramImage','departmentname','ProgramDescription')->where([['ProgramStatus','=',1],['DepartmentStatus','=',1],['departmentname','=',$name]])->paginate(3);
    	}
    	
    	$content = "";
    	foreach ($collection as $key => $value) {
    		$content .= '<div class="col-md-3 card">';
    		$image = '<img src="'.asset('/'.$value->ProgramImage).'" style="width:100%!important;">';
            $content .= $image;
            $content .=  '<div class="card-title"><h4>'.strtoupper($value->programname).'</h4></div>
            <div class="card-footer"><a href="'.URL('/ProgramDescription/'.$value->ProgramId).'">More Info >></a></div>
                </div>';
    	}
    	$content .= $collection->links();
    	echo $content;
    }
    public function programDetails($id)
    {
    	$collection=DB::table('tbl_program')->join('tbl_department','tbl_program.DepartmentId','=','tbl_department.DepartmentId')->select('ProgramId','programname','ProgramImage','departmentname','ProgramDescription')->where('ProgramId','=',$id)->get();
    	$name = "";
    	$description="";
    	foreach ($collection as $key => $value) {
    		$name = $value->programname;
    		$description = $value->ProgramDescription;
    	}
    	$description = explode('|',$description);
    	$count = count($description);;
    	return view('programdetails')->with(['program'=>$collection,'name'=>$name,'description'=>$description,'count'=>$count]);
    }
}
