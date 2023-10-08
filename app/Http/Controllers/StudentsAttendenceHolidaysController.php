<?php

namespace App\Http\Controllers;

use App\Models\StudentsAttendenceHolidays;
use Illuminate\Http\Request;
use App\Models\Campuses;
use Illuminate\Support\Facades\Auth;

class StudentsAttendenceHolidaysController extends Controller
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
        //
    }
    public static function getHolidays()
    {
        $campus_id=Auth::user()->campus_id;
        $campus = campuses::find($campus_id);
        $data = StudentsAttendenceHolidays::where('campus_id',$campus_id)->get();
        return $data;
    }
    public static function isHoliday($a_date)
    {
        $campus_id=Auth::user()->campus_id;
        $campus = campuses::find($campus_id);
        $data = StudentsAttendenceHolidays::where('campus_id',$campus_id)->where('date',$a_date)->first();
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
        $campus_id=Auth::user()->campus_id;
        $campus = campuses::find($campus_id);
        $settings = StudentsAttendenceHolidays::create($request->post()+['campus_id' => $campus_id,'session_id' => $campus->active_session]);
        $history = $this->newlog('student-holidays',$settings->id,'Create','New Student Holiday Created');
        return redirect()->back()->with('success','Student Holiday has been created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudentsAttendenceHolidays  $studentsAttendenceHolidays
     * @return \Illuminate\Http\Response
     */
    public function show(StudentsAttendenceHolidays $studentsAttendenceHolidays)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudentsAttendenceHolidays  $studentsAttendenceHolidays
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentsAttendenceHolidays $studentsAttendenceHolidays)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StudentsAttendenceHolidays  $studentsAttendenceHolidays
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentsAttendenceHolidays $studentsAttendenceHolidays)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentsAttendenceHolidays  $studentsAttendenceHolidays
     * @return \Illuminate\Http\Response
     */
    public function destroy($studentsAttendenceHolidays)
    {
        $student = StudentsAttendenceHolidays::find($studentsAttendenceHolidays); 
        $history = $this->newlog('student-holidays', $student->id,'Delete','Student Holiday Deleted'); 

        $student->delete();

        return response(['msg'=>'Deleted'], 200);
    }
}
