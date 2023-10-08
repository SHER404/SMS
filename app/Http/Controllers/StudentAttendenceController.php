<?php

namespace App\Http\Controllers;

use App\Models\StudentAttendence;
use App\Models\StudentAttendenceHistory;
use App\Models\Students;
use Illuminate\Support\Facades\Auth;
use App\Models\StudentParent;
use App\Models\Campuses;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class StudentAttendenceController extends Controller
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
        $st_id='';
        $atc_id='';
        
        $allclasses = StudentClass::where('campus_id',$campus->id)->get();
        $data = StudentAttendence::where('campus_id',$campus->id)->get();
        $query= Students::query();
        $query->with('class');
        $query->where('campus_id',$campus->id);
        $query->where('academic_session_id',$campus->active_session);
        if($request->student){
            $st_id=$request->student;
            $query->where('id',$request->student);
        }
        //if($request->class){
            $atc_id=$request->class;
            $allstudents = Students::where('campus_id',$campus->id)->where('class_id',$atc_id)->where('academic_session_id',$campus->active_session)->get();
            $query->where('class_id',$request->class);
        //} 
        if($request->class){
           
            $allstudents = Students::where('campus_id',$campus->id)->where('class_id',$atc_id)->where('academic_session_id',$campus->active_session)->get();
           
        }else{
            $allstudents =array();

        } 
        if($request->reg_id){
            $query->where('Registration_id',$request->reg_id);
        } 
        if($request->month){
            $attendence_start=$request->month;
        } 
        
        $student=$query->get();
       
        return view('modules.attendence.students.index',compact(['data','student','allstudents','allclasses','attendence_start','st_id','atc_id']));
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
        $all = Students::where('campus_id',$campus->id)->where('academic_session_id',$campus->active_session)->count();
        $new_data = StudentAttendence::where('attendence_date', $a_date)->where('campus_id',$campus->id)->where('session_id',$campus->active_session)->groupBy('student_id')->get();
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
    public static function getStudentAttendence($date=null,$id=null)
    {
       
       $data = StudentAttendence::where('student_id',$id)->where('attendence_date', $date)->first();
       return $data;
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
    public function updateAttendence(Request $request){
           
        $new=array();
        $id = $request->id;
        $att = $request->att;
        $a_date = $request->a_date;
        $campus = $this->globalSettings();
        $student= Students::find($id);
        $old_data = StudentAttendence::where('student_id',$id)->where('attendence_date', $a_date)->first();
        if($old_data){
            $old = StudentAttendence::where('student_id',$id)->where('attendence_date', $a_date)->first();           
            $att_val=$old->attendence_value;
            $msg='Removed';
            $old->delete();
            $new_hist = StudentAttendenceHistory::create([
                'user_id' => Auth::user()->id,
                'student_id' => $id,
                'attendence_date' => $a_date,
                'attendence_value' => $att_val,
                'campus_id' => $campus->id,
                'msg' => $msg,
                'session_id' => $campus->active_session,
                'class_id' => $student->class_id,
                'section_id' => $student->section_id
                  
            ]);
        }
        
        if($att!='' && $att!=null){
            $new = StudentAttendence::create([
                'student_id' => $id,
                'attendence_date' => $a_date,
                'attendence_value' => $att,
                'campus_id' => $campus->id,
                'session_id' => $campus->active_session,
                'class_id' => $student->class_id,
                'section_id' => $student->section_id
                  
            ]);
            $att_val=$att;
            $msg='Added';
            $new_hist = StudentAttendenceHistory::create([
                'user_id' => Auth::user()->id,
                'student_id' => $id,
                'attendence_date' => $a_date,
                'attendence_value' => $att_val,
                'campus_id' => $campus->id,
                'msg' => $msg,
                'session_id' => $campus->active_session,
                'class_id' => $student->class_id,
                'section_id' => $student->section_id
                  
            ]);

        }
        $a_date_m=date('m',strtotime($a_date));
        $a_date_y=date('Y',strtotime($a_date));
        $total_p=0;
        $total_a=0;
        $total_l=0;
        $total_h=0;
        
        $new_data = StudentAttendence::where('student_id',$id)->whereMonth('attendence_date', $a_date_m)->whereYear('attendence_date', $a_date_y)->get();
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
        $cid = $request->class_id;
        $att = $request->att;
        $a_date = $request->a_date;
        $campus = $this->globalSettings();
        $students= Students::where('class_id',$cid)->get();
        foreach($students as $student){
            $old_data = StudentAttendence::where('student_id',$student->id)->where('attendence_date', $a_date)->first();
        if($old_data){
            $old = StudentAttendence::where('student_id',$student->id)->where('attendence_date', $a_date)->first();           
            $att_val=$old->attendence_value;
            $msg='Removed';
            $old->delete();
            
        }
        
        if($att!='' && $att!=null){
            $new = StudentAttendence::create([
                'student_id' => $student->id,
                'attendence_date' => $a_date,
                'attendence_value' => $att,
                'campus_id' => $campus->id,
                'session_id' => $campus->active_session,
                'class_id' => $student->class_id,
                'section_id' => $student->section_id
                  
            ]);
           
           

        }

        }
        
        
        
       
        
         
        return response(['data'=>'Success',200]);

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudentAttendence  $studentAttendence
     * @return \Illuminate\Http\Response
     */
    public function show(StudentAttendence $studentAttendence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudentAttendence  $studentAttendence
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentAttendence $studentAttendence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StudentAttendence  $studentAttendence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentAttendence $studentAttendence)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentAttendence  $studentAttendence
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentAttendence $studentAttendence)
    {
        //
    }
}
