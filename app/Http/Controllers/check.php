<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Leave;
class check extends Controller
{
    function showdetail(Request $request)
    {
       
       $empid= $request->empid;
       
       $data= DB::table('employee')->where('empid',$empid);
       $show=DB::table('leavedetail')
       //->join('employee','employee.empid','leavedetail.empid')
       ->get();
    
        
            //$roleid=$data->value('roleid');
            //dd($roleid);
       return response()->json($show);

    }
    function leave(Request $request)
    {
        
        $empid= $request->empid;
        
        $reason=$request->input('reason');
        $days=$request->input('days');
        $from=$request->input('from');
        $to=$request->input('to');
        $data=DB::table('leavedetail')->insert(
            ['empid'=>$empid, 'reason'=>$reason,'days'=>$days,'datefrom'=>$from,'dateto'=>$to]);

                
        
        $list = Leave::where('empid', '=', $empid)->get();
        return response()->json($list);
    }
}
