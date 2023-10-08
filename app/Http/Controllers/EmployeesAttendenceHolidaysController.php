<?php

namespace App\Http\Controllers;

use App\Models\EmployeesAttendenceHolidays;
use Illuminate\Http\Request;
use App\Models\Campuses;
use Illuminate\Support\Facades\Auth;

class EmployeesAttendenceHolidaysController extends Controller
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
        $data = EmployeesAttendenceHolidays::where('campus_id',$campus_id)->get();
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
        $settings = EmployeesAttendenceHolidays::create($request->post()+['campus_id' => $campus_id,'session_id' => $campus->active_session]);
        $history = $this->newlog('employee-holidays',$settings->id,'Create','New Employees Holiday Created');
        return redirect()->back()->with('success','Employees Holiday has been created successfully.');
    }
    public static function isHoliday($a_date)
    {
        $campus_id=Auth::user()->campus_id;
        $campus = campuses::find($campus_id);
        $data = EmployeesAttendenceHolidays::where('campus_id',$campus_id)->where('date',$a_date)->first();
        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmployeesAttendenceHolidays  $employeesAttendenceHolidays
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeesAttendenceHolidays $employeesAttendenceHolidays)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmployeesAttendenceHolidays  $employeesAttendenceHolidays
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployeesAttendenceHolidays $employeesAttendenceHolidays)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmployeesAttendenceHolidays  $employeesAttendenceHolidays
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmployeesAttendenceHolidays $employeesAttendenceHolidays)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmployeesAttendenceHolidays  $employeesAttendenceHolidays
     * @return \Illuminate\Http\Response
     */
    public function destroy($employeesAttendenceHolidays)
    {
        $employee = EmployeesAttendenceHolidays::find($employeesAttendenceHolidays); 
        $history = $this->newlog('employee-holidays', $employee->id,'Delete','Employees Holiday Deleted'); 

        $employee->delete();
    }
}
