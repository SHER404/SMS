<?php

namespace App\Http\Controllers;

use App\Models\SchoolVisitor;
use Illuminate\Http\Request;
use App\Models\StudentClass;
use App\Models\SchoolVisitorClass;
use App\Models\AcademicSession;

class SchoolVisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $campus =$this->globalSettings();
        $status='';
        $st_id='';
        $atc_id='';
        $session_id='';
        $allclasses = StudentClass::where('campus_id',$campus->id)->get();
        $allsessions = AcademicSession::where('campus_id',$campus->id)->get();
        $query= SchoolVisitor::query();
        $query->with(['studentClasses' =>function($q) use ($request){
            if($request->class){
                $atc_id=$request->class;
                $q->where('class_id',$request->class);
            } 
                 $q->with('class');
        }]);
        if($request->class){
            $atc_id=$request->class;
          
        } 
        $query->where('campus_id',$campus->id);
        $query->where('session_id',$campus->active_session);
        
        
        if($request->student_number){
            
            $query->has('studentClasses', '=' , $request->student_number);
        } 
        if($request->v_date){
            
            $query->where('visiting_date',$request->v_date);
        } 
        if($request->session_id){
            $session_id=$request->session_id;
            $query->where('session_id',$request->session_id);
        }
        if($request->status){
            $status=$request->status;
            $query->where('status',$request->status);
        }
        $data=$query->get();
        return view('modules.SchoolVisitor.index',compact(['data','allclasses','atc_id','allsessions','session_id','status']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $campus =$this->globalSettings();
       
       
        $classes = StudentClass::where('campus_id',$campus->id)->get();
        
        return view('modules.SchoolVisitor.add',compact(['classes']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campus =$this->globalSettings();
        $SchoolVisitor =  SchoolVisitor::create($request->except(['student_name','class_id'])+['campus_id'=>$campus->id,'session_id'=>$campus->active_session]);
        $history = $this->newlog('school-visitors', $SchoolVisitor->id,'Create','SchoolVisitor Created');
         
         for($i=0; $i<count($request->class_id); $i++){

            $SchoolVisitorClass = new SchoolVisitorClass();
            $SchoolVisitorClass->student_name = $request->student_name[$i];
            $SchoolVisitorClass->visitor_id = $SchoolVisitor->id;
            $SchoolVisitorClass->class_id = $request->class_id[$i];
            $SchoolVisitorClass->campus_id = $campus->id;
            $SchoolVisitorClass->session_id = $campus->active_session;
            $SchoolVisitorClass->save();

            }

            if(auth()->user()->hasRole('GateKeeper')){
                return redirect()->route('school-visitors.create')->with('success','SchoolVisitor has been created successfully.');
            }else{
                return redirect()->route('school-visitors.index')->with('success','SchoolVisitor has been created successfully.');
            }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SchoolVisitor  $schoolVisitor
     * @return \Illuminate\Http\Response
     */
    public function show(SchoolVisitor $schoolVisitor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SchoolVisitor  $schoolVisitor
     * @return \Illuminate\Http\Response
     */
    public function edit($schoolVisitor)
    {
        $data = SchoolVisitor::find($schoolVisitor);
        $campus =$this->globalSettings();
        $classes = StudentClass::where('campus_id',$campus->id)->get();
        
        return view('modules.SchoolVisitor.edit',compact(['data','classes']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SchoolVisitor  $schoolVisitor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $schoolVisitor)
    {
        $data = SchoolVisitor::find($schoolVisitor);
        $history = $this->newlog('school-visitors', $data->id,'Update','SchoolVisitor Updated');
        $data->update($request->all());
        return redirect()->route('school-visitors.index')->with('success','SchoolVisitor has been updated successfully.');
    }
    public function changeStatus(Request $request){

        $id = $request->id;
        $status = $request->status;
        $data=SchoolVisitor::where('id',$id)->update(['status'=>$status]);
        return response(['data'=>$data],200);

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SchoolVisitor  $schoolVisitor
     * @return \Illuminate\Http\Response
     */
    public function destroy(SchoolVisitor $schoolVisitor)
    {
        $data = SchoolVisitor::find($schoolVisitor); 
        $history = $this->newlog('school-visitors', $data->id,'Delete','SchoolVisitor Deleted');
        $data->delete();
        return response(['msg'=>'Deleted'], 200);
    }
}
