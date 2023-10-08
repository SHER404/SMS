<?php

namespace App\Http\Controllers;
use App\Models\Town;
use App\Models\FeeHead;
use App\Models\StudentsFee;
use App\Models\Students;
use App\Models\StudentParent;
use App\Models\StudentClass;
use App\Models\StudentHealth;
use App\Models\Family;
use App\Models\Employees;
use App\Models\ClassSection;
use App\Models\AcademicSession;
use Redirect;
use App\Models\Campuses;
use App\Models\Country;
use App\Models\City;
use App\Models\StudentLanguage;
use App\Models\EmergencyPhone;
use App\Models\RescuePhone;
use App\Models\FamilyMember;
use App\Models\PaidFees;
use Illuminate\Http\Request;

class PaidFeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $campus =$this->globalSettings();
        $allstudents = Students::where('campus_id',$campus->id)->where('academic_session_id',$campus->active_session)->get();
        $allclasses = StudentClass::where('campus_id',$campus->id)->get();
        $families = Family::where('campus_id',$campus->id)->get();
        $data = PaidFees::where('campus_id',$campus->id)->get();
        $query= Students::query();
        $query->with('class');
        $query->where('campus_id',$campus->id);
        $query->where('academic_session_id',$campus->active_session);
        if($request->student){
            $query->where('id',$request->student);
        }
        if($request->class){
            $query->where('class_id',$request->class);
        }
        if($request->family){
            $query->where('family_id',$request->family);
        } 
        if($request->reg_id){
            $query->where('Registration_id',$request->reg_id);
        } 
        $student=$query->get();
       
        return view('modules.paid-fees.index',compact(['data','student','allstudents','allclasses','families']));
        
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaidFees  $paidFees
     * @return \Illuminate\Http\Response
     */
    public function show(PaidFees $paidFees)
    {
       //
    }
    public static function paidFee($month=null,$year=null,$id=null)
    {
       
       $data = PaidFees::where('student_id',$id)->whereYear('fee_date', $year)->whereMonth('fee_date', $month)->get();
       return $data;
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaidFees  $paidFees
     * @return \Illuminate\Http\Response
     */
    public function edit(PaidFees $paidFees)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaidFees  $paidFees
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaidFees $paidFees)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaidFees  $paidFees
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaidFees $paidFees)
    {
        //
    }
}
