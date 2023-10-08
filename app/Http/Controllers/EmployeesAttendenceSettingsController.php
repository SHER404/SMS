<?php

namespace App\Http\Controllers;

use App\Models\EmployeesAttendenceSettings;
use Illuminate\Http\Request;
use App\Models\Campuses;
use Illuminate\Support\Facades\Auth;

class EmployeesAttendenceSettingsController extends Controller
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
    public static function getSttings()
    {
        $campus_id=Auth::user()->campus_id;
        $campus = campuses::find($campus_id);
        $data = EmployeesAttendenceSettings::where('campus_id',$campus_id)->first();
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
        $campus_id=Auth::user()->campus_id;
        $settings = EmployeesAttendenceSettings::create($request->post()+['campus_id' => $campus_id]);
        $history = $this->newlog('employee-attendence-settings',$settings->id,'Create','New Employee Attendence Created');
        return redirect()->back()->with('success','Setting has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmployeesAttendenceSettings  $employeesAttendenceSettings
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeesAttendenceSettings $employeesAttendenceSettings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmployeesAttendenceSettings  $employeesAttendenceSettings
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployeesAttendenceSettings $employeesAttendenceSettings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmployeesAttendenceSettings  $employeesAttendenceSettings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = EmployeesAttendenceSettings::find($id);
        $history = $this->newlog('employee-attendence-settings',$data->id,'Update','Employees Attendence Settings Updated');
        $data->update($request->all());
        return redirect()->back()->with('success','Setting has been Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmployeesAttendenceSettings  $employeesAttendenceSettings
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeesAttendenceSettings $employeesAttendenceSettings)
    {
        //
    }
}
