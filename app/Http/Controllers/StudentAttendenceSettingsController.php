<?php

namespace App\Http\Controllers;

use App\Models\StudentAttendenceSettings;
use Illuminate\Http\Request;
use App\Models\Campuses;
use Illuminate\Support\Facades\Auth;

class StudentAttendenceSettingsController extends Controller
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
        $data = StudentAttendenceSettings::where('campus_id',$campus_id)->first();
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
        $settings = StudentAttendenceSettings::create($request->post()+['campus_id' => $campus_id]);
        $history = $this->newlog('student-attendence-settings',$settings->id,'Create','New Student Attendence Created');
        return redirect()->back()->with('success','Setting has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudentAttendenceSettings  $studentAttendenceSettings
     * @return \Illuminate\Http\Response
     */
    public function show(StudentAttendenceSettings $studentAttendenceSettings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudentAttendenceSettings  $studentAttendenceSettings
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentAttendenceSettings $studentAttendenceSettings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StudentAttendenceSettings  $studentAttendenceSettings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = StudentAttendenceSettings::find($id);
        $history = $this->newlog('student-attendence-settings',$data->id,'Update','Student Attendence Updated');
        $data->update($request->all());
        return redirect()->back()->with('success','Setting has been created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentAttendenceSettings  $studentAttendenceSettings
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentAttendenceSettings $studentAttendenceSettings)
    {
        //
    }
}
