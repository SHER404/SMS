<?php

namespace App\Http\Controllers;

use App\Models\EmployeesAttendence;
use App\Models\Employees;
use Illuminate\Http\Request;
use App\Models\StudentAttendence;
use App\Models\StudentAttendenceHistory;
use App\Models\Students;
use Illuminate\Support\Facades\Auth;
use App\Models\StudentParent;
use App\Models\Campuses;
use App\Models\StudentClass;


class EmployeesAttendenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $campus =$this->globalSettings();
        $attendence_start=date('Y-m-d');
        $emp_id='';
        $atc_id='';
        $allemployees = Employees::where('campus_id',$campus->id)->get();
        $data = EmployeesAttendence::where('campus_id',$campus->id)->get();
        $query= Employees::query();
        $query->where('campus_id',$campus->id);
        if($request->employee){
            $emp_id=$request->employee;
            $query->where('id',$request->employee);
        }
        
        if($request->month){
            $attendence_start=$request->month;
        } 
        
        $employees=$query->get();
       
        return view('modules.attendence.employees.index',compact(['data','employees','allemployees','attendence_start','emp_id']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public static function getEmployeesAttendence($date=null,$id=null)
    {
       
       $data = EmployeesAttendence::where('employee_id',$id)->where('attendence_date', $date)->first();
       return $data;
    }
    public function updateAttendence(Request $request){
           
        $new=array();
        $id = $request->id;
        $att = $request->att;
        $a_date = $request->a_date;
        $campus = $this->globalSettings();
        $student= Employees::find($id);
        $old_data = EmployeesAttendence::where('employee_id',$id)->where('attendence_date', $a_date)->first();
        if($old_data){
            $old = EmployeesAttendence::where('employee_id',$id)->where('attendence_date', $a_date)->first();           
            $att_val=$old->attendence_value;
            $msg='Removed';
            $old->delete();
            
        }
        
        if($att!='' && $att!=null){
            $new = EmployeesAttendence::create([
                'employee_id' => $id,
                'attendence_date' => $a_date,
                'attendence_value' => $att,
                'campus_id' => $campus->id,
                'session_id' => $campus->active_session
                
                  
            ]);
            $att_val=$att;
            $msg='Added';
           

        }
        $a_date_m=date('m',strtotime($a_date));
        $a_date_y=date('Y',strtotime($a_date));
        $total_p=0;
        $total_a=0;
        $total_l=0;
        $total_h=0;
        
        $new_data = EmployeesAttendence::where('employee_id',$id)->whereMonth('attendence_date', $a_date_m)->whereYear('attendence_date', $a_date_y)->get();
        foreach($new_data as $n){
            if($n->attendence_value=='P'){
                $total_p++;
            }
            if($n->attendence_value=='A'){
                $total_a++;
            }
            if($n->attendence_value=='L'){
                $total_l++;
            }
            if($n->attendence_value=='H'){
                $total_h++;
            }
        }
         
        return response(['data'=>$new,'total_p' => $total_p,'total_a' => $total_a,'total_l' => $total_l,'total_h' => $total_h],200);

    }
    public function updateAttendenceDefault(Request $request){
           
        $new=array();
       
        $att = $request->att;
        $a_date = $request->a_date;
        $campus = $this->globalSettings();
        $employees= Employees::where('campus_id',$campus->id)->get();
        foreach($employees as $employee){
            $old_data = EmployeesAttendence::where('employee_id',$employee->id)->where('attendence_date', $a_date)->first();
            if($old_data){
                $old = EmployeesAttendence::where('employee_id',$employee->id)->where('attendence_date', $a_date)->first();           
                $att_val=$old->attendence_value;
                $msg='Removed';
                $old->delete();
                
            }
            
            if($att!='' && $att!=null){
                $new = EmployeesAttendence::create([
                    'employee_id' => $employee->id,
                    'attendence_date' => $a_date,
                    'attendence_value' => $att,
                    'campus_id' => $campus->id,
                    'session_id' => $campus->active_session  
                ]);
                $att_val=$att;
                $msg='Added';
            }

        }
        
        
        
       
        
         
        return response(['data'=>'Success',200]);

    }

    public static function getAttendence(){
        $a_date=date('Y-m-d');
       
        $total_p=0;
        $total_a=0;
        $total_l=0;
        $total_h=0;
        $all=0;
        $campus_id=Auth::user()->campus_id;
        $campus = campuses::find($campus_id);
        $all = Employees::where('campus_id',$campus->id)->count();
        $new_data = EmployeesAttendence::where('attendence_date', $a_date)->where('campus_id',$campus->id)->where('session_id',$campus->active_session)->groupBy('employee_id')->get();
        foreach($new_data as $n){
            if($n->attendence_value=='P'){
                $total_p++;
            }
            if($n->attendence_value=='A'){
                $total_a++;
            }
            if($n->attendence_value=='L'){
                $total_l++;
            }
            if($n->attendence_value=='H'){
                $total_h++;
            }
           
        }
        $data['all']=$all;
        $data['p']=$total_p;
        $data['a']=$total_a;
        $data['l']=$total_l;
        $data['h']=$total_h;
        return $data;

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmployeesAttendence  $employeesAttendence
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeesAttendence $employeesAttendence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmployeesAttendence  $employeesAttendence
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployeesAttendence $employeesAttendence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmployeesAttendence  $employeesAttendence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmployeesAttendence $employeesAttendence)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmployeesAttendence  $employeesAttendence
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeesAttendence $employeesAttendence)
    {
        //
    }
}
