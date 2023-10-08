<?php

namespace App\Http\Controllers;

use App\Models\Students;
use App\Models\FeeHead;
use App\Models\StudentsFee;
use Illuminate\Http\Request;

class StudentsFeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $campus =$this->globalSettings();
        $studentfee= StudentsFee::all();
        $fee_heads = FeeHead::where('campus_id',$campus->id)->get();
        $studentId = $_GET['student_id'];

        return view('modules.fee-management.add',compact(['studentfee','fee_heads','studentId']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->head_id == null){
                return redirect()->back()->with('error', 'Before submit please checked the Box!');
        }else{
            $studentsFee = studentsFee::where('student_id',$request->student_id); 
            $studentsFee->delete();
    
            for($i=0; $i<count($request->head_id); $i++){
    
                $student_fee = new StudentsFee();
                $student_fee->fee_head_id = $request->head_id[$i];
                $student_fee->student_id = $request->student_id;
                $student_fee->fee_head = $request->fee_head[$i];
                $student_fee->actual_amount	= $request->actual_amount[$i];
                $student_fee->fee_amount = $request->fee_amount[$i];
                $student_fee->fee_discount = $request->discount_amount[$i];
                $student_fee->save();
        
                }
    
                return redirect('/students');
               
    

        }      

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudentsFee  $studentsFee
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
       
        $campus =$this->globalSettings();
        $fee_heads = FeeHead::where('campus_id',$campus->id)->get();
        $data = StudentsFee::where('student_id',$id)->get();
        return view('modules.fee-management.edit',compact(['data','fee_heads','id']));
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudentsFee  $studentsFee
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentsFee $studentsFee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StudentsFee  $studentsFee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        for($i=0; $i<count($request->head_id); $i++){

            $student_fee = new StudentsFee();
            $student_fee->fee_head_id = $request->head_id[$i];
            $student_fee->student_id = $request->student_id;
            $student_fee->fee_head = $request->fee_head[$i];
            $student_fee->actual_amount	= $request->actual_amount[$i];
            $student_fee->fee_amount = $request->fee_amount[$i];
            $student_fee->fee_discount = $request->discount_amount[$i];
           
            $student_fee->save();
    
            }

           
            $data = Students::all();
            return view('modules.students.index',compact(['data']));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentsFee  $studentsFee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $studentsFee = studentsFee::find($studentsFee); 
        $studentsFee->delete();

        return response(['msg'=>'Deleted'], 200);
    }
}
